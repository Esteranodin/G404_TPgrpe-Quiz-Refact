<?php

include_once '../utils/autoloader.php';
include_once '../utils/db.php';

$qcm = new Qcm(1, "POO");

$question = new Question("POO signifie :");
$question2 = new Question("L'héritage c'est quoi :");

$questions = [
    $question,
    $question2
];

// ici on créé les instances directement dans le tableau VS au dessus instances au préalable + ajout dans un tableau dans un second temps 
$answers = [
    new Answer('Programmation Orientée Objet',true),
    new Answer('Papillon Onirique Ostentatoire')
];


$answers2 = [
    new Answer('De la thune'),
    new Answer('Un principe de POO', true)
];

$QcmManager = new QcmManager();

// if ($answers2[1]->getAnswerGood() === true){
// echo"hjehrjkezh";
// } else {
//     echo "non";
// }

$qcm->setQuestions($questions);

$question->setAnswers($answers);
$question2->setAnswers($answers2);


$question->setExplanationAnswer('La réponse correcte est "Programmation Orientée Objet".');

$question2->setExplanationAnswer('La réponse correcte est "Un principe de POO".');

$qcmRepository = new QcmRepository($db);
$questionRepository = new QuestionRepository($db);
var_dump($qcmRepository->findAll());
var_dump($questionRepository->findAllQuestions());
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUIZ</title>
    <link rel="stylesheet" href="../public/assets/styles/output.css">
</head>

<body  >

<?= $QcmManager->generateDisplay($qcm); ?>
    
</body>
</html>