<?php

final class QcmManager {
    
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
