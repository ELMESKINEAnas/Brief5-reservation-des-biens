<?php


include '../Model/model.php';

class controllers extends Model
{
    public function Autonfication()
    {
        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $pass = md5($_POST['pass']);

            $stm  = $this->conn->prepare("SELECT * FROM user WHERE email = :user and password = :pass");
            $stm->bindValue(':user',  $email, PDO::PARAM_STR);
            $stm->bindValue(':pass', $pass, PDO::PARAM_STR);
            $stm->execute();

            $row = $stm->fetch(PDO::FETCH_ASSOC);

            $RowCount = $stm->rowCount();

            if ($RowCount  == 1) {
                // Initialize the session
                session_start();

                if ($row['role'] == 1) {
                    $_SESSION['id'] =  $row['id_user'];
                    $_SESSION['role'] =  1;

                    // Redirect user to index.php
                    // header("Location: admin.php");
                    header("Location: index.php");
                } else {
                    $_SESSION['id'] = $row['id_user'];
                    $_SESSION['role'] =  0;

                    header("Location: index.php");
                }
            }
        }
    }


    public function Register()
    {
        if (isset($_POST['creer'])) {
            $email = $_POST['email'];
            $pass = md5($_POST['pass']);
            $role = 0;

            $fname = $_POST['prenom'];
            $lname = $_POST['nom'];
            $phone = $_POST['numero'];

            $stm  = $this->conn->prepare("INSERT INTO user (email, password, role) VALUES (:user, :pass, :role)");
            $stm->bindValue(':user',  $email, PDO::PARAM_STR);
            $stm->bindValue(':pass',  $pass, PDO::PARAM_STR);
            $stm->bindValue(':role',  $role, PDO::PARAM_INT);
            $stm->execute();

            $stm1  = $this->conn->prepare("SELECT * FROM user WHERE email = :user");
            $stm1->bindValue(':user',  $email, PDO::PARAM_STR);
            $stm1->execute();
            $row = $stm1->fetch(PDO::FETCH_ASSOC);
            $fk_user = $row['id_user'];



            $stm2  = $this->conn->prepare("INSERT INTO client (nom_client, prenom_client, phone_client, fk_user) VALUES (:prenom, :nom, :numero, :fk_user)");

            $stm2->bindValue(':prenom',  $fname, PDO::PARAM_STR);
            $stm2->bindValue(':nom',  $lname, PDO::PARAM_STR);
            $stm2->bindValue(':numero',  $phone, PDO::PARAM_STR);
            $stm2->bindValue(':fk_user',  $fk_user, PDO::PARAM_INT);
            $stm2->execute();


            header("Location: index.php");
        }
    }


    public function fetch()
	{
		$data = null;

		$query = "SELECT * FROM reservation";
		$sql = $this->conn->query($query);
        
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_ASSOC);
		// if ($sql) {
		// 	while ($row = $sql->fetch()) {
				
		// 		$data[] = $row;
		// 	}
		// }
		return $data;
	}


}