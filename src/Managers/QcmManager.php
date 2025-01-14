<?php

final class QcmManager
{

    // public function getRepository () {
    // Récupérer les données du QCM (via différents repository).
    // }

    // public function compoRepository () {
    // Recomposer le QCM : à partir des datas du QCM, des datas des questions et des datas des réponses qui le compose, il sera charger de composer l'instance QCM final.
    // }

    public function generateDisplay(Qcm $qcm): string
    {
        $name = htmlspecialchars($qcm->getName());
        $questionsHtml = "";
        $answerHtml = "";

        foreach ($qcm->getQuestions() as $question) {
            $questionName = htmlspecialchars($question->getNameQuestion());
            $questionsHtml .= "<h2>{$questionName}</h2>";

            foreach ($question->getAnswers() as $answer) {
                $answerName = htmlspecialchars($answer->getNameAnswer());
                $answerHtml .= "<li>{$answerName}</li>";
            }
        }

        $display = <<<HTML


                    <section>
                        <h1>{$name}</h1>
                        <h2>{$questionsHtml}
                            <ul>{$answerHtml}</ul>
                        </h2>
                    </section>



                    HTML;

        return $display;
    }




    // -------------- Autre méthode d'affichage un peu moins lisible avec concaténation: -------------- 
    //     public function generateDisplay(Qcm $qcm): string
    //     {

    //         $display = "<section>";

    //         $display .=  "<h2>" . $qcm->getName() . "</h2>";

    //         foreach ($qcm->getQuestions() as $question) {

    //             $display .=  "<h3>" . $question->getNameQuestion() . "</h3>";

    //             $display .=  "<ul>";

    //             foreach ($question->getAnswers() as $answer) {
    //                 $display .=  "<li>" . $answer->getNameAnswer() . "</li>";
    //             }
    //             $display .= "</ul>";
    //         }

    //         return $display;
    //     }

}
?>


<?php

class QcmManager {
    
    public function generateDisplay(Qcm $qcm) {
        
        ob_start();
        
        ?>
        <section>
            <h1>
                Test
            </h1>
            <h2>
                <?= $qcm->getName() ?>
            </h2>
            <?php foreach ($qcm->getQuestions() as $question) { ?>
                <h3>
                    <?= $question->getNameQuestion() ?>
                </h3>
                <ul>
                    <?php foreach ($question->getAnswers() as $answer) { ?>
                        <li>
                            <?= $answer->getNameAnswer() ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
        </section>
        <?php
        
        return ob_get_clean();
    }
}

?>
