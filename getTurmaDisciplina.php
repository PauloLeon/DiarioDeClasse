
 <?php
 
include 'php/session.php';
$q = intval($_GET['q']);
debug_to_console($q);
$jsonTurmaDisciplinas =  $userLogado->getTurmaDisciplinaJSON($q);
$jsonTurmaDisciplinas = json_decode($jsonTurmaDisciplinas);

$jsonDisciplinas = $userLogado->getDisciplinaJSON($userLogado->getId());
                    $jsonDisciplinas = json_decode($jsonDisciplinas);
                    if(empty($jsonDisciplinas))
                    {
                        echo"
                        <li class=\"form-group\" style=\"margin-left: 30px;\">
                            <input type=\"checkbox\" name=\"my-checkbox\" data-size=\"mini\" data-on-text=\"Sim\" 
                            data-off-text=\"Não\"  data-animate=\"true\" disabled=\"true\"  unchecked>
                        Você ainda não tem disciplinas cadastradas.  
                        </li>";
                    }
                    foreach($jsonDisciplinas as $val)
                    {
                        echo"<li 
                                id=\"".$val->idDisciplina."\" 
                                class=\"list-group-item \"  
								
                                style=\"margin-left: 30px;  margin-right: 30px;\" >
                                     <input id=\"my-checkbox\" 
                                     type=\"checkbox\" 
                                     name=".$val->idDisciplina."  
                                     data-size=\"mini\" 
                                     data-on-text=\"Sim\" 
                                     data-off-text=\"Não\" 
                                     data-animate=\"true\"
									 
                                     unchecked> 
                                 &nbsp;".$val->nome." 
                              </li>";					
                    }  
 ?>

