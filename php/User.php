<?php
require_once('model/conexao.php');
	class User
	{
		private $userEmail;
		private $connDataBase;
		private $userName;
		private $idUser;
		private $link;


		function __construct($emailSession,$nomeSession,$idUserSession)
    {
      	$this->userEmail = $emailSession;
				$this->connDataBase = new conexao();
				$this->link = $this->connDataBase->getLink();
				$this->userName = $nomeSession;
				$this->idUser = $idUserSession;
				if($this->link == "")
				{
					debug_to_console("Link já começa vazio". "- ARQUIVO:User.php");
				}
				if($this->connDataBase == "")
				{
					debug_to_console("Conexao já começa vazio tambem". "- ARQUIVO:User.php");
				}
 	  }

		public function getEmail()
		{
			return $this->userEmail;
		}
		public function getId()
		{
			return $this->idUser;
		}
		public function getNome()
		{
			return $this->userName;
		}
		public function getConexao()
		{
			return $this->connDataBase;
		}
		//metodos de debug
		public function isConnect()
		{
			if($this->connDataBase==""){
				return "conexão vazia";
			}else{
				return "conexão ativa";
			}
		}

		public function isLink()
		{
			if($this->link==""){
				return "link vazio";
			}else{
				return "link ativo";
			}
		}

//INSERT BANCO ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		public function insertEscolaBanco($nome,$cidade,$idusuario)
		{
			try{
				$sql ="INSERT INTO escola(nome,cidade,usuario_idUsuario)VALUES("."\"".$nome."\"".","."\"".$cidade."\"".",".$idusuario.");";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../Cadastrar.php">';
			} catch (Exception $exc) {
       		    die($exc->getTraceAsString());
    		}

		}

		public function insertDisciplinaBanco($nome, $idusuario)
		{
			try{
				$sql ="INSERT INTO disciplina(nome,fk_idUsuario)VALUES("."\"".$nome."\""." , ".$idusuario.");";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastrarDisciplina.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}


		public function insertTurmaBanco($nome,$turno,$fk_idEscola,$fk_idUsuario,$arrayDisciplinas,$lancamento)
		{
			try{
				$fk_idEscola = $this->getIdEscolaFromInsertTurmaBanco($fk_idEscola,$fk_idUsuario);
				$sql ="INSERT INTO turma(nome,turno,fk_idEscola,fk_idUsuario,tipo_frequencia)VALUES("."\"".$nome."\"".","."\"".$turno."\"".", ".implode( $fk_idEscola)." , ".$fk_idUsuario." , ".$lancamento." );";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				$this->insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas);
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastroTurma.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas)
		{
			$fk_idTurma = $this->getIdTurmaFromInsertAlunoBanco($nome,$fk_idUsuario);
			debug_to_console("CHEGOU");
			foreach($arrayDisciplinas as $val)
			{
			  $sql ="INSERT INTO turma_disciplina(fk_idTurma,fk_idDisciplina, fk_idUsuario) VALUES(".implode($fk_idTurma)." , ".$val.", ".$fk_idUsuario.");";
			  debug_to_console($sql);
			  $result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
			  if($result==false)
			  {
				  debug_to_console($sql. "- ARQUIVO:User.php");
			  }
			}
		}

		public function insertAlunoBanco($nome,$fk_idTurma,$fk_idUsuario)
		{
			try{
				$fk_idTurma = $this->getIdTurmaFromInsertAlunoBanco($fk_idTurma,$fk_idUsuario);
				$sql ="INSERT INTO aluno(nome, fk_idturma, fk_idUsuario) VALUES("."\"".$nome."\"".",".implode( $fk_idTurma)." , ".$fk_idUsuario.");";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastrarAluno.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		//A função de insert já lança as faltas em conjunto..
		public function insertDiaDeAulaBanco($fk_idUsuario,$fk_idTurma,$fk_idDisciplina,$quantidade,$dia,$mes,$ano,$arrayAlunos,$arrayQuantidade,$arrayAlunosJustificativaID,$arrayJustificativa)
		{
				$mes = $this->getMesStringToNumber($mes);
				$data = "". $ano ."-". $mes ."-". $dia ."";
				debug_to_console($data.  " - Data de inserção ARQUIVO:User.php");

				$fk_idTurmaDisciplina = $this->getIdTurmaDisciplina($fk_idUsuario,$fk_idTurma,$fk_idDisciplina);
				debug_to_console(implode($fk_idTurmaDisciplina). "- idTurmaDisciplina ARQUIVO:User.php");


				debug_to_console($fk_idTurmaDisciplina. "- idTurmaDisciplina sem implode ARQUIVO:User.php");
				debug_to_console($fk_idUsuario. "- fk_idUsuario ARQUIVO:User.php");
				debug_to_console($quantidade. "- quantidade ARQUIVO:User.php");


			try{
					/*Atenção a este SQL ele tem que possuir as '' para a $data -
					conversão interna do objeto PHP para Date no mysql*/
					debug_to_console("Entrou - ARQUIVO:User.php");
					//$sql ="INSERT INTO diadeaula(fk_idUsuario,fk_idTurmaDisciplina,quantidade,data,ativo)VALUES(".$fk_idUsuario.",".implode($fk_idTurmaDisciplina).",".$quantidade.",'".$data."',1);";

					$sql ="INSERT INTO diadeaula(fk_idUsuario,fk_idTurmaDisciplina,quantidade,data,ativo)VALUES( ". $fk_idUsuario ." , ". implode($fk_idTurmaDisciplina) ." , ". $quantidade ." , ' ". $data ." ' , 1) ;";
					debug_to_console($sql. "- ARQUIVO:User.php");
					//TEM QUE FAZER RETORNAR AQUI O DIADEAULAINSERIDO
					$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
					if($result==false)
					{
						debug_to_console($sql. "- ARQUIVO:User.php");
						debug_to_console(" Entrou FALSE- ARQUIVO:User.php");

					}else{
						debug_to_console(" Entrou 2 - ARQUIVO:User.php");
						$fk_idDiaDeAula = $this->getLastIdDiaDeAula($fk_idUsuario);
						debug_to_console($fk_idDiaDeAula. "- getLastIdDiaDeAula ARQUIVO:User.php");
						//aqui estou previnindo erro! Para caso a quantidade de faltas por aluno seja diferente do numero de alunos. Não lançar faltas!
						if(count($arrayQuantidade)==count($arrayAlunos))
						{
							for ($x = 0; $x < count($arrayAlunos); $x++)
							{
								try{
									$this->insertFalta($fk_idUsuario,$fk_idDiaDeAula,$arrayQuantidade[$x],$arrayAlunos[$x],$data,implode($fk_idTurmaDisciplina));
								}catch(Exception $exc){
									die($exc->getTraceAsString());
								}
							}
						}else{
							debug_to_console($arrayQuantidade." - ".$arrayAlunos." Array de quantidade de faltas é diferente do de alunos count() - ARQUIVO:User.php");
						}
						//aqui estou previnindo erro! Para caso a quantidade de faltas por aluno seja diferente do numero de alunos. Não lançar Justificativas!
						if(count($arrayAlunosJustificativaID)==count($arrayJustificativa))
						{
							for ($i = 0; $i < count($arrayAlunosJustificativaID); $i++)
							{
								try{
									$this->insertJustificativa($fk_idUsuario,$fk_idDiaDeAula,$arrayAlunosJustificativaID[$i],$arrayJustificativa[$i]);
								}catch(Exception $exc){
									die($exc->getTraceAsString());
								}
							}
						}else{
							debug_to_console($arrayAlunosJustificativaID." - ".$arrayJustificativa." Array de quantidade de Justificativas é diferente do de alunos count() - ARQUIVO:User.php");
						}
					}
			}catch(Exception $exc){
					die($exc->getTraceAsString());
			}
		}

		public function insertFalta($fk_idUsuario,$fk_idDiaDeAula,$quantidade,$fk_idALuno, $data, $fk_idTurmaDisciplina)
		{
			try{
				$sql ="INSERT INTO falta(fk_idAluno, fk_idDiaDeAula, fk_idUsuario, quantidade, fk_idTurma_Disciplina, data, ativo)
				VALUES(".$fk_idALuno.", ".$fk_idDiaDeAula.", ".$fk_idUsuario.", ".$quantidade." , ". $fk_idTurmaDisciplina ." , '". $data ."', 1);";

				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function insertJustificativa($fk_idUsuario,$fk_idDiaDeAula,$fk_idAluno,$justificativa)
		{
			try{
				$sql ="UPDATE falta SET justificativa= "."\"".$justificativa."\"".",is_justificado= true WHERE fk_idUsuario= "
				.$fk_idUsuario." AND fk_idDiaDeAula= ".$fk_idDiaDeAula." AND fk_idAluno= ".$fk_idAluno." ;";

				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function insertOcorrencia($fk_idUsuario,$fk_idAluno,$fk_idTurma,$dia,$mes,$ano,$ocorrencia)
		{
			try{
				$mes = $this->getMesStringToNumber($mes);
				$data = "". $ano ."-". $mes ."-". $dia ."";
				debug_to_console($data.  " - Data de inserção ARQUIVO:User.php");
				$sql = "INSERT INTO Ocorrencia (fk_idUsuario, fk_idAluno, fk_idTurma, Data, ocorrencia, ativo)".
				"VALUES (".$fk_idUsuario.", ".$fk_idAluno." , ".$fk_idTurma." , ' ".$data." ' , "."\"".$ocorrencia."\""." , 1);";
				debug_to_console($sql. "- ARQUIVO:User.php");
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function insertParecer($fk_idUsuario,$fk_idAluno,$parecer,$tipoParecer)
		{
			try{
				$sql = "INSERT INTO parecer (fk_idUsuario, fk_idAluno, parecer, tipoParecer, ativo)".
				"VALUES (".$fk_idUsuario.", ".$fk_idAluno." , "."\"".$parecer."\""." , "."\"".$tipoParecer."\""." , 1);";
				debug_to_console($sql. "- ARQUIVO:User.php");
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}


//FIM INSERT'S----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//GET'S BANCO-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------



public function getLastIdDiaDeAula($fk_idUsuario)
		{
			//depois fazer de um jeito melhor codificado
			try{
				$sql ="SELECT MAX(idDiaDeAula) as idDiaDeAula FROM diadeaula WHERE fk_idUsuario = ".$fk_idUsuario.";";
				debug_to_console($sql. "- :User.php");
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				$obj = json_decode($json);
				if($result==false)
				{
					debug_to_console($sql. "- getLastIdDiaDeAula  ARQUIVO:User.php");
				}
				foreach($obj as $val)
				{
					debug_to_console($val->idDiaDeAula. "- getLastIdDiaDeAula ARQUIVO:User.php");
					$result = $val->idDiaDeAula;
				}
				return $result;
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}



public function getIdTurmaFromInsertAlunoBanco($fk_idTurma,$fk_idUsuario)
		{
			try{
				//pode ser que de errado o sql mas os numeros foram tratados assim como "" em strings
				$sql ="SELECT idTurma FROM turma WHERE ativo=1 AND fk_idUsuario = ".$fk_idUsuario." AND nome = "."\"".$fk_idTurma."\""." ;";
				debug_to_console($sql. "- :User.php");
				//tem que ver se vai retornar uma somente.
				$result=$this->connDataBase->queryArrayEscolas($sql);

				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				debug_to_console($result[0]. "- ARQUIVO:User.php");
				return $result[0];
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function getIdAlunoFromUpdateAlunoBanco($nome,$fk_idUsuario)
		{
			try{
				$sql = "SELECT idAluno FROM aluno WHERE fk_idUsuario = ".$fk_idUsuario." AND lcase(nome) = lcase("."\"".$nome."\"".") ;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				return $result[0];
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}


		//apagar se nao precisar depois
		public function getEscolas($idusuario)
		{
			try{
				$sql ="SELECT nome,cidade FROM escola".
				" WHERE usuario_idUsuario = ".$idusuario.
				" AND ativo = 1".
				" ORDER BY nome ASC;";
				$result=$this->connDataBase->query($sql);
				$row = mysql_fetch_array($result);
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function getEscolasJSON($idusuario)
		{
			try{
				$sql ="SELECT nome,cidade,idEscola FROM escola".
				" WHERE usuario_idUsuario = ".$idusuario.
				" AND ativo = 1".
				" ORDER BY nome ASC;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}


		public function getTurmaJSON($idusuario)
		{
			try{
				$sql ="SELECT
						t.nome as nmTurma,
						t.idTurma as idTurma,
						t.turno as turno,
						t.tipo_frequencia as tipo_frequencia,
						e.nome as nmEscola
						FROM turma t
						left join escola e on (e.idEscola = t.fk_idEscola)
						WHERE t.fk_idUsuario = ".$idusuario.
						" AND t.ativo = 1 "." ;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function getTurmaDisciplinaJSON($idTurma)
		{
			try{
			/*	$sql ="	SELECT td.fk_idDisciplina as idDisciplina

						FROM turma_disciplina td
						WHERE td.fk_idTurma = ".$idTurma." ;";	*/

				$sql ="SELECT td.fk_idDisciplina as idDisciplina,
									d.nome as nmDisciplina
									FROM turma_disciplina td
									left join disciplina d on (d.idDisciplina = td.fk_idDisciplina)
									WHERE td.fk_idTurma =".$idTurma.";";

				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function getAllTurmaDisciplinaJSON($idUsuario)
		{
			try{
			    $sql ="SELECT td.fk_idDisciplina as idDisciplina,
									td.fk_idTurma as idTurma,
									d.nome as nmDisciplina
									FROM turma_disciplina td
									left join disciplina d on (d.idDisciplina = td.fk_idDisciplina)
									WHERE td.fk_idUsuario = ".$idUsuario.";";

				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}


		public function getDisciplinaJSON($idusuario)
		{
			try{
				$sql = "SELECT nome, idDisciplina FROM disciplina
						WHERE ativo = 1 AND fk_idUsuario = ".$idusuario."
						ORDER BY nome ASC ;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function getIdDisciplinaJSON($nome, $idusuario)
		{
			try{
				$sql = "SELECT idDisciplina FROM disciplina
						WHERE ativo = 1 AND fk_idUsuario = ".$idusuario." AND nome = "."\"".$nome."\""."
						ORDER BY nome ASC;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}



		public function getAlunosJson($idusuario,$q)
		{
			try{
				$sql = "SELECT
						a.nome as nmAluno,
						a.idAluno as idAluno,
						t.nome as nmTurma
						FROM aluno a
						left join turma t on (t.idturma = a.fk_idturma)
						WHERE a.fk_idUsuario = ".$idusuario."
						  and a.fk_idTurma = ". $q ."
						  and a.ativo = 1
						 ORDER BY a.nome ASC;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function getAlunosFromTurmaJson($idusuario,$idTurma)
		{
			try{
				$sql = "SELECT
						a.nome as nmAluno,
						a.idAluno as idAluno,
						t.nome as nmTurma
						FROM aluno a
						left join turma t on (t.idturma = ".$idTurma.")
						WHERE a.fk_idUsuario = ".$idusuario."
						AND  a.ativo = 1
						 ORDER BY t.nome ASC;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				$json = json_encode($result);
				return $json;
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function getAlunoNome($idAluno)
		{
			try{
				$sql = "SELECT
						a.nome
						FROM aluno a
						WHERE a.idAluno = ". $idAluno ."
						AND  a.ativo = 1 ;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				if(empty($result))
				{
					return "erro nada nada nada";
				}
				return $result[0];
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}




		public function getIdEscolaFromInsertTurmaBanco($fk_idEscola,$fk_idUsuario)
		{
			try{
				$sql ="SELECT idEscola FROM escola WHERE Usuario_idUsuario = ".$fk_idUsuario." AND nome = "."\"".$fk_idEscola."\""." ;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				return $result[0];
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}


		}

		public function getMesStringToNumber($mes)
		{
			//switch para definir os meses
			switch ($mes) {
   				case "Jan":
       			 	$mes = "01";
    	   			break;
				case "Fev":
       			 	$mes = "02";
    	   			break;
				case "Mar":
       			 	$mes = "03";
    	   			break;
	   			case "Abr":
       				 $mes = "04";
       		 		break;
		    	case "Mai":
        			$mes = "05";
	        		break;
				case "Jun":
       			 	$mes = "06";
    	   			break;
				case "Jul":
       			 	$mes = "07";
    	   			break;
				case "Ago":
       			 	$mes = "08";
    	   			break;
				case "Set":
       			 	$mes = "09";
    	   			break;
				case "Out":
       			 	$mes = "10";
    	   			break;
				case "Nov":
       			 	$mes = "11";
    	   			break;
				case "Dez":
       			 	$mes = "12";
    	   			break;
			 }
			 return $mes;
		}

		public function getIdTurmaDisciplina($fk_idUsuario,$fk_idTurma,$fk_idDisciplina)
		{
				try{
				$sql ="select idTurmaDisciplina from turma_disciplina
							where fk_idTurma = ".$fk_idTurma."
									and fk_idDisciplina = ".$fk_idDisciplina."
        							and fk_idUsuario = ".$fk_idUsuario."
        							and ativo =  1;";
				$result=$this->connDataBase->queryArrayEscolas($sql);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				return $result[0];
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function getAllOcorrencia($fk_idUsuario,$fk_idAluno)
		{
			try{
			    $sql ="SELECT idOcorrencia, fk_idUsuario, fk_idAluno, ocorrencia, DATE_FORMAT(data,'%d-%m-%Y') as data FROM ocorrencia WHERE fk_idUsuario=".$fk_idUsuario." AND fk_idAluno=".$fk_idAluno." AND ativo= 1  ;";
				debug_to_console($sql);
				$result=$this->connDataBase->queryArrayEscolas($sql);
				debug_to_console($result[0]);
				$json = json_encode($result);
				debug_to_console($json);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function getAllParecer($fk_idUsuario,$fk_idAluno)
		{
			try{
			    $sql ="SELECT idParecer, fk_idUsuario, fk_idAluno, parecer, tipoParecer FROM parecer WHERE fk_idUsuario=".$fk_idUsuario." AND fk_idAluno=".$fk_idAluno." AND ativo= 1  ;";
				debug_to_console($sql);
				$result=$this->connDataBase->queryArrayEscolas($sql);
				debug_to_console($result[0]);
				$json = json_encode($result);
				debug_to_console($json);
				return $json;

			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}


//FIM GETTER'S ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//UPDATE BANCO ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		public function updateAluno($nome,$idAluno,$fk_idUsuario)
		{
			try{
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastrarAluno.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function updateEscola($nome,$cidade,$idEscola,$fk_idUsuario)
		{
			try{
				$sql ="UPDATE escola SET nome= "."\"".$nome."\"".",cidade= "."\"".$cidade."\""." WHERE Usuario_idUsuario= ".$fk_idUsuario." AND idEscola= ".$idEscola." ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../Cadastrar.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function updateTurma($idTurma,$nome,$turno,$fk_idEscola,$fk_idUsuario,$arrayDisciplinas)
		{
			try{

				$fk_idEscola = $this->getIdEscolaFromInsertTurmaBanco($fk_idEscola,$fk_idUsuario);
				$sql ="UPDATE turma SET nome= "."\"".$nome."\"".",turno= "."\"".$turno."\"".",
				fk_idEscola = ".implode($fk_idEscola)." WHERE fk_idUsuario= ".$fk_idUsuario." AND idTurma= ".$idTurma." ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				//$this->insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas);
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastroTurma.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}
/* POR FAZER!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!*/
		#update ocorrencia
		#UPDATE Ocorrencia
		#SET ativo=1,fk_idTurma=1, Data='2016-01-14', ocorrencia='chegou atrasado mais é o chefe'
		#WHERE fk_idUsuario=1 AND fk_idAluno=1;

		public function updateOcorrencia($fk_idUsuario,$fk_idAluno,$fk_idTurma,$dia,$mes,$ano,$ocorrencia,$idOcorrencia)
		{
			try{
				$mes = $this->getMesStringToNumber($mes);
				$data = "". $ano ."-". $mes ."-". $dia ."";
				debug_to_console($data. "- ARQUIVO:User.php");
				$sql ="UPDATE Ocorrencia SET ocorrencia= "."\"".$ocorrencia."\"".", ativo=1, fk_idTurma=".$fk_idTurma.", Data='".$data."'
				 WHERE fk_idUsuario= ".$fk_idUsuario." AND fk_idAluno= ".$fk_idAluno."  AND idOcorrencia=".$idOcorrencia."  ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				//$this->insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas);
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastroTurma.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

		public function updateParecer($fk_idUsuario,$fk_idAluno,$parecer,$idParecer,$tipoParecer)
		{
			try{
				$sql ="UPDATE parecer SET parecer= "."\"".$parecer."\"".", tipoParecer= "."\"".$tipoParecer."\"".", ativo=1
				 WHERE fk_idUsuario= ".$fk_idUsuario." AND fk_idAluno= ".$fk_idAluno."  AND idParecer=".$idParecer."  ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				//$this->insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas);
				//echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastroTurma.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}
		}

	/*	public function insertTurmaDisciplina($nome,$fk_idUsuario,$arrayDisciplinas)
		{
			$fk_idTurma = $this->getIdTurmaFromInsertAlunoBanco($nome,$fk_idUsuario);
			$jsonPesquisa=$this->getTurmaDisciplinaJSON($fk_idTurma);
			$jsonPesquisa = json_decode($jsonPesquisa);

			foreach($arrayDisciplinas as $val)
			{
				foreach($jsonPesquisa as $valINT)
				{
					if($valINT->idDisciplina==$val)
					{
						$flag=false;
					}

				}
				if($flag){
					$sql ="INSERT INTO turma_disciplina(fk_idTurma, fk_idDisciplina) VALUES(".implode($fk_idTurma)." , ".$val.");";
					debug_to_console($sql);
					$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
					if($result==false)
					{
						debug_to_console($sql. "- ARQUIVO:User.php");
					}
				}
			}

		} */


//FIM UPDATE ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


//REMOVE BANCO ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		public function removeAluno($idAluno,$fk_idUsuario)
		{
			try{
				$sql = "UPDATE aluno SET ativo = 0 WHERE idAluno= ".$idAluno." and fk_idUsuario= ".$fk_idUsuario." ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastrarAluno.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function removeEscola($idEscola)
		{
			try{
				$sql_um="UPDATE aluno SET ativo = 0
			WHERE fk_idTurma in (SELECT id_turma FROM turma t WHERE t.fk_idEscola = ".$idEscola.")";
				$result=$this->connDataBase->insertBanco($sql_um,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}

				$sql_dois="UPDATE turma SET ativo = 0  WHERE fk_idEscola = ".$idEscola.";";
				$result=$this->connDataBase->insertBanco($sql_dois,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}

				$sql_tres="UPDATE escola SET ativo = 0 WHERE idescola = ".$idEscola." ;";
				$result=$this->connDataBase->insertBanco($sql_tres,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../Cadastrar.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function removeTurma($idTurma)
		{
			try{
				$sql_um="UPDATE aluno SET ativo = 0
				WHERE fk_idTurma in (SELECT id_turma FROM turma t WHERE t.idTurma = ".$idTurma.")";
				$result=$this->connDataBase->insertBanco($sql_um,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql_um. "- ARQUIVO:User.php");
				}

				$sql_dois="UPDATE turma SET ativo = 0  WHERE idTurma = ".$idTurma.";";
				$result=$this->connDataBase->insertBanco($sql_dois,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql_dois. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastroTurma.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function removeOcorrencia($idOcorrencia,$fk_idUsuario)
		{
			try{
				$sql = "UPDATE Ocorrencia SET ativo = 0 WHERE idOcorrencia= ".$idOcorrencia." and fk_idUsuario= ".$fk_idUsuario." ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
				echo '<meta HTTP-EQUIV="Refresh" CONTENT="1; URL=../CadastrarAluno.php">';
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}

		public function removeParecer($idParecer,$fk_idUsuario)
		{
			try{
				$sql = "UPDATE parecer SET ativo = 0 WHERE idParecer= ".$idParecer." and fk_idUsuario= ".$fk_idUsuario." ;";
				$result=$this->connDataBase->insertBanco($sql,$this->connDataBase);
				if($result==false)
				{
					debug_to_console($sql. "- ARQUIVO:User.php");
				}
			}catch(Exception $exc){
				die($exc->getTraceAsString());
			}

		}
//FIM REMOVE ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		function debug_to_console( $data )
		{
   			 if ( is_array( $data ) )
       			 $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
   			 else
        		$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
   			 echo $output;
		}

	}

?>
