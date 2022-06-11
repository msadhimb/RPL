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

        function insertData($data)
        {
                $rs = $this->db->prepare("INSERT INTO user (nama, password) VALUES (?, ?)");
                $rs->execute($data);
        }

        function cekLogin($data)
        {
                $cekuser = $this->db->prepare("SELECT * FROM user WHERE nama=?");
                $cekuser->execute([$data[0]]);

                if ($cekuser->rowCount() > 0) {
                        $cekuser->setFetchMode(PDO::FETCH_ASSOC);
                        $user = $cekuser->fetch();
                        if (password_verify($data[1], $user['password'])) {
                                session_start(); //untuk memulai session
                                //melakukan assignment terhadap variabel session
                                $_SESSION['uname'] = $data[0];
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
        }

        function orderAction($data)
        {
                $order = $this->db->prepare("INSERT INTO ordered (kode_pesanan, pesanan, gambar, deskripsi, totalHarga) VALUES (?, ?, ?, ?, ?)");
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
}
