<?php 
class Cadastro{
	public function cadastrar($nome,$rg,$cpf,$dtnasc,$endereco,$email,$telefone){
		$nome=ucwords(strtolower($nome));
		$endereco=ucwords(strtolower($endereco));

		//validacao de email
		$PDO = db_connect();
		$validar= $PDO->prepare("SELECT * FROM professor
                        WHERE nm_email_professor = :email OR cpf_professor = :cpf");
		$validar->bindValue(':email', $email);
		$validar->bindValue(':cpf', $cpf);
		$validar->execute();
		$resultado= $validar->rowCount();

		if ($resultado == 0) {	
		//insercao no banco
	    $sql = "INSERT INTO professor(nm_professor,
             registro_geral_professor,
            cpf_professor,
            dt_nascimento_professor,
            nm_endereco,
            nm_email_professor,
            cd_telefone_professor)
            VALUES(
            :nome,
            :rg,
            :cpf,
            :dtnasc,
            :endereco,
            :email,
            :telefone)";
			$stmt = $PDO->prepare($sql);
			$stmt->bindParam(':nome' ,$nome);
			$stmt->bindParam(':rg' ,$rg);
			$stmt->bindParam(':cpf' ,$cpf);
			$stmt->bindParam(':dtnasc' ,$dtnasc);
			$stmt->bindParam(':endereco' ,$endereco);
			$stmt->bindParam(':email' ,$email);
			$stmt->bindParam(':telefone' ,$telefone);		
			$stmt->execute();
			header ('Location: ../Professor/index.php');
		}else{
                    $msg="Desculpe, mas já existe um usuário com este email e/ou cpf em nosso sistema!";
		}
			if (isset($stmt)) {
				$msg="Cadastro realizado com sucesso!";
			}else{
				if (empty($msg)) {
					$msg="Ops!, Houve um erro em nosso sistema, contate o administrador!";
				}
				
			}
			echo $msg;
		}
	}
	?>