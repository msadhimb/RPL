<?php
class Database
{
        function __construct()
        {
                try {
                        $this->db = new PDO("mysql:host;host=localhost;dbname=fotoin", "root", "");
                } catch (PDOException $e) {
                        echo $e->getMessage();
                }
        }

        function getDataAll()
        {
                $rs = $this->db->query("SELECT * FROM data");
                return $rs;
        }

        function getDataDetail()
        {
                $idPisah = explode("|", base64_decode($_GET['id']));
                $rs = $this->db->prepare("SELECT * FROM data WHERE id=?");
                $rs->execute([$idPisah[1]]);
                return $rs;
        }

        function getDataAllCam()
        {
                $rs = $this->db->query("SELECT * FROM camera");
                return $rs;
        }

        function getDataDetailCam()
        {
                $idPisah = explode("|", base64_decode($_GET['idCam']));
                $rs = $this->db->prepare("SELECT * FROM camera WHERE id=?");
                $rs->execute([$idPisah[1]]);
                return $rs;
        }

        function getDataUser()
        {
                $rs = $this->db->query("SELECT * FROM user");
                return $rs;
        }

        function insertData($data)
        {
                $rs = $this->db->prepare("INSERT INTO user (nama, email, password) VALUES (?, ?, ?)");
                $rs->execute($data);
        }

        function insertAdmin($data)
        {
                $rs = $this->db->prepare("INSERT INTO admin (nama, email, password) VALUES (?, ?, ?)");
                $rs->execute($data);
        }

        function cekLogin($data)
        {
                $namaPisah = explode("@", $data[0]);
                $namaPisah2 = explode(".", $namaPisah[1]);

                if ($namaPisah2[0] === "admin") {
                        $cekuser = $this->db->prepare("SELECT * FROM admin WHERE email=?");
                        $cekuser->execute([$data[0]]);

                        if ($cekuser->rowCount() > 0) {
                                $cekuser->setFetchMode(PDO::FETCH_ASSOC);
                                $user = $cekuser->fetch();

                                if (password_verify($data[1], $user['Password'])) {

                                        session_start(); //untuk memulai session
                                        //melakukan assignment terhadap variabel session

                                        $_SESSION['jam_mulai'] = date("Y-m-d H:i:s");
                                        $_SESSION['jam_selesai'] = date("Y-m-d H:i:s", strtotime("+1 hour"));
                                        $_SESSION['isLogin'] = true;


                                        header("Location: admin/index.php?idAdmin=" . base64_encode(sha1(rand()) . "|" . $user['id']));
                                } else {
                                        header("Location: login.php?message=failed");
                                }
                        } else {
                                header("Location: login.php?message=failed");
                        }
                } else if ($namaPisah2[0] === "gmail") {
                        $cekuser = $this->db->prepare("SELECT * FROM user WHERE email=?");
                        $cekuser->execute([$data[0]]);

                        if ($cekuser->rowCount() > 0) {
                                $cekuser->setFetchMode(PDO::FETCH_ASSOC);
                                $user = $cekuser->fetch();

                                if (password_verify($data[1], $user['password'])) {

                                        session_start(); //untuk memulai session
                                        //melakukan assignment terhadap variabel session

                                        $_SESSION['jam_mulai'] = date("Y-m-d H:i:s");
                                        $_SESSION['jam_selesai'] = date("Y-m-d H:i:s", strtotime("+1 hour"));
                                        $_SESSION['isLogin'] = true;

                                        header("Location: client/index.php?idUser=" . base64_encode(sha1(rand()) . "|" . $user['id']));
                                } else {
                                        header("Location: login.php?message=failed");
                                }
                        } else {
                                header("Location: login.php?message=failed");
                        }
                } else if ($namaPisah2[0] === "manager") {
                        $cekuser = $this->db->prepare("SELECT * FROM manajer WHERE email=?");
                        $cekuser->execute([$data[0]]);

                        if ($cekuser->rowCount() > 0) {
                                $cekuser->setFetchMode(PDO::FETCH_ASSOC);
                                $user = $cekuser->fetch();

                                if ($data[1] === $user['password']) {

                                        session_start(); //untuk memulai session
                                        //melakukan assignment terhadap variabel session

                                        $_SESSION['jam_mulai'] = date("Y-m-d H:i:s");
                                        $_SESSION['jam_selesai'] = date("Y-m-d H:i:s", strtotime("+1 hour"));
                                        $_SESSION['isLogin'] = true;

                                        header("Location: manager/index.php?idMngr=" . base64_encode(sha1(rand()) . "|" . $user['id']));
                                } else {
                                        header("Location: login.php?message=failed");
                                }
                        } else {
                                header("Location: login.php?message=failed");
                        }
                }
        }

        function orderAction($data)
        {
                $order = $this->db->prepare("INSERT INTO ordered (kode_pesanan, pesanan, nama, gambar, deskripsi, harga, totalHarga) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $order->execute($data);
        }

        function cekAkun()
        {
                $idPisah = explode("|", base64_decode($_GET['idUser']));
                $rs = $this->db->prepare("SELECT * FROM user WHERE id=?");
                $rs->execute([$idPisah[1]]);
                return $rs;
        }

        function kodeUser($data)
        {
                $order = $this->db->prepare("UPDATE user SET kode_pesanan = ? WHERE id = ?");
                $order->execute($data);
        }

        function getOrder()
        {
                $idPisah = explode("|", base64_decode($_GET['kode_pesanan']));
                $rs = $this->db->prepare("SELECT * FROM ordered WHERE kode_pesanan=?");
                $rs->execute([$idPisah[1]]);
                return $rs;
        }

        function orderDone()
        {
                $id = explode("|", base64_decode($_GET['kode_pesanan']));

                $upd = $this->db->prepare("UPDATE user SET kode_pesanan = '' WHERE kode_pesanan = ?");
                $upd->execute([$id[1]]);


                $del = $this->db->prepare("DELETE FROM ordered WHERE kode_pesanan = ?");
                $del->execute([$id[1]]);
        }

        function getDataAdmin()
        {
                $rs = $this->db->query("SELECT * FROM admin");
                return $rs;
        }

        function deleteAdmin()
        {
                $id = explode("|", base64_decode($_GET['idAdmin']));
                $del = $this->db->prepare("DELETE FROM admin WHERE id=?");
                $del->execute([$id[1]]);
        }
}
