<?php 

include_once'../utils/autoloader.php';

$qcm = new Qcm();

var_dump($qcm->addNameQcm("blabla")->showQcm());

// $question = new Question('POO signifie :');


// $answers = [
//     new Answer('Programmation Orientée Objet', true),
//     new Answer('Papillon Onirique Ostentatoire')
// ];
// $question->setAnswers($answers);
// $question->setExplanation('La réponse correcte est "Programmation Orientée Objet".');
// $questions = [
//     $question
// ];
// $qcm->setQuestions($questions);

// var_dump($qcm) 
// vous devez avoir une instance de Qcm qui a un titre et un tableau de Question. Chaque Question a un intitulé, une explication de sa bonne réponse et un tableau d'Answer possible. Chaque Answer a un intitulé et si c'est une bonne ou mauvaise réponse.
?>