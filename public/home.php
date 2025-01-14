<?php

include_once '../utils/autoloader.php';

$qcm = new Qcm("La Prog. orientée objet");

$question = new Question("POO signifie :");
$question2 = new Question("L'héritage c'est quoi :");

$reponse = new Answer("les bezjejzkekd", true);


$answers = [
    new Answer('Programmation Orientée Objet',true),
    new Answer('Papillon Onirique Ostentatoire')
];


$answers2 = [
    new Answer('De la thune'),
    new Answer('Un principe de POO', true)
];


// if ($answers2[1]->getAnswerGood() === true){
// echo"hjehrjkezh";
// } else {
//     echo "non";
// }


$question->setAnswers($answers);
$question2->setAnswers($answers2);


$question->setExplanation('La réponse correcte est "Programmation Orientée Objet".');

$question2->setExplanation('La réponse correcte est "Un principe de POO".');

$questions = [
    $question,
    $question2
];

$qcm->setQuestions($questions);

$QcmManager = new QcmManager();

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