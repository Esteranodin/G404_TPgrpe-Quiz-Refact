# POO QCM Refacto Plus

## 📝 QCM en POO PHP avec Entités, Repositories, Managers, et Autoloader

Ce TP s'adresse aux apprenants ayant déjà un niveau correct en développement web et sert d'alternative à sa version classique : [POO-QCM-Refacto](https://github.com/G404-DWWM/POO-QCM-Refacto).

➡️ Il prend en compte les enseignements et recommandation du [Memo](https://github.com/G404-DWWM/POO-Memo).

## 🚀 Introduction

Ce TP vous permettra de mettre en pratique la programmation orientée objet (POO) en PHP, tout en intégrant des concepts avancés tels que :

- Les **entités**, pour représenter vos données.
- Les **mappers**, pour transformer les données de la base en objets.
- Les **repositories**, pour gérer les requêtes SQL.
- Les **managers**, pour centraliser la logique métier.
- Un **autoloader**, pour organiser et charger automatiquement vos classes.

Vous allez créer un système de QCM dynamique et structuré. Le TP est découpé en deux parties :

1. Construction des classes et affichage statique.

2. Intégration de PDO et interaction avec une base de données.

## 🎯 Objectifs pédagogiques

À l'issue de ce TP, vous serez capable de :

- Structurer un projet PHP en utilisant un **autoloader** pour charger les classes automatiquement.

- Créer des **entités** qui reflètent des objets métiers et leurs propriétés.

- Mettre en place des **repositories** pour centraliser les requêtes SQL et gérer l'accès aux données.

- Utiliser des **mappers** pour convertir des données issues de la base en objets PHP.

- Organiser la logique métier dans des **managers**, pour rendre le code plus maintenable.

- Appliquer les bases de la POO en PHP dans un cas concret et fonctionnel.

## 🌳 Arborescence

Voici la structure de fichiers de base à suivre (n'hésitez pas à l'aggrémenter en fonction des fonctionnalités que vous implémentez) :

```bash
/utils
    autoloader.php
    db.php
/src
    /Entities
        Qcm.php
        Question.php
        Answer.php
    /Mappers
        QcmMapper.php
        QuestionMapper.php
        AnswerMapper.php
    /Repositories
        QcmRepository.php
        QuestionRepository.php
        AnswerRepository.php
    /Managers
        QcmManager.php

/public
    /assets
        /styles
        /scripts
        /imgs
    home.php
    ... les autres pages à la racine de public
index.php
```

### 📂 Dossier `/src`

* Contient les différentes classes organisées par type : `Entities`, `Mappers`, `Repositories`, et `Managers`.

### 📂 Dossier `/utils`

* Contient différents utilitaires pour l'application, comme **l’autoloader** pour charger automatiquement toutes les classes nécessaires ou l'instanciation de la classe **PDO** pour la connexion à la base de données.

### 📂 Dossier `/public`
Contient les pages comme `home.php`, qui sera la première page du site, ou le dossier `/assets` dans lequelle il y aura les fichiers statiques (les images, les styles, les scripts...) pour le navigateur, organisés en différents dossiers.

### 📄 `index.php`
Accueil la requête d'accès à l'app sur le serveur et redirige le client sur la première page statique `home.php`

<hr>

## 🚦 Partie 1 : Mise en place des entités et affichage statique

Pour cette étape, reprenez et retravailler le diagramme relation Entités/Associations que vous aviez fait pour la première version de cette App.

### 🔧 Étape 1 : Implémentez les entités

Pour l'instant **nous ne nous occuperons pas** de la gestion en **BDD** de nos entités, donc vous n'aurez **pas besoin de CRUD** ou de **PDO**.

⚠️ Pensez bien à préparer les getter qui vont vous permettre de générer l'affichage d'un QCM plus tard ainsi que les constructeurs qui vont vous permettre de tester vos entités.

Implémentez les entités suivantes : 

* #### Qcm 

Répresente un Quiz avec un thème. Un Qcm a un ensemble de questions (il va falloir utiliser la composition POO).

* #### Question

Représente une Question avec un intitulé et un ensemble de réponses possible. Une question a aussi une explication de sa bonne réponse.

* #### Answer

Représente une Answer avec un intitulé et si c'est une bonne ou une mauvaise réponse.

### 🔧 Étape 2 : Génération statique

Utilisez les entités pour générer un QCM sur une page d'affichage (ceci est un exemple de ce que vous devez avoir et n'est aucunement fonctionnel) :

```php
<?php 
$qcm = new Qcm();
$question = new Question('POO signifie :');
$answers = [
    new Answer('Programmation Orientée Objet', true),
    new Answer('Papillon Onirique Ostentatoire')
];
$question->setAnswers($answers);
$question->setExplanation('La réponse correcte est "Programmation Orientée Objet".');
$questions = [
    $question
];
$qcm->setQuestions($questions);

var_dump($qcm) // vous devez avoir une instance de Qcm qui a un titre et un tableau de Question. Chaque Question a un intitulé, une explication de se bonne réponse et un tableau d'Answer possible. Chaque Answer a un intitulé et si c'est une bonne ou mauvaise réponse.
?>
```

```html
<section>
    
    <h2><?= $qcm->getTitle() ?></h2>

    <?php foreach($qcm->getQuestions as $question){ ?>
        <h3><?= $question->getTitle() ?></h3>
        <ul>
            <?php foreach($question->getAnswers as $answer){ ?>
                <li><?= $answer->getTitle() ?></li>
            <?php } >   
        </ul>

    <?php } >
</section>
```

### 🔧 Étape 3 : Manager

Ici vous devez décrire une première version du Manager de QCM `QcmManager.php`.

Pour l'instant votre première mission avec celui-ci sera de lui faire gérer la partie `génération de l'affichage` d'un QCM (il pourra avoir par exemple une méthode **generateDisplay**, qui prendra en paramètre un QCM et retournera le HTML de ce QCM avec ses questions et réponses).

#### 🎯 Rôle du QCM Manager

A terme de ce TP, ce **QCM Manager** serait responsable de :

1. **Récupérer les données** du QCM (via différents repository).

2. **Recomposer le QCM** : à partir des datas du QCM, des datas des questions et des datas des réponses qui le compose, il sera charger de composer l'instance QCM final.

3. **Préparer le rendu du QCM**, c’est-à-dire générer le HTML à afficher.

4. Centraliser toute la logique métier liée à l’affichage ou à l'interaction avec le QCM.

### 🚀 Avantages d'utiliser un QCM Manager

1. **Séparation des responsabilités :**

    * Le **QCM Manager** s’occupe uniquement de la logique métier et de la présentation.

    * Les entités (ex. : `Question`, `Answer`) restent centrées sur les données elles-mêmes.

2. **Modularité :**

    * Si la présentation du QCM doit être modifiée (par exemple, pour utiliser un framework front-end ou générer un JSON), seule la méthode de génération du manager doit être adaptée.

3. **Clarté du code :**

    * Le code qui génère le visuel est isolé, rendant les entités et les repositories plus simples.

<hr>

## 🚦 Partie 2 : Intégration avec une base de données

### 🔧 Étape 4 : Implémentez les mappers et repositories

* #### Les mappers

[Rappel du Mémo](https://github.com/G404-DWWM/POO-Memo?tab=readme-ov-file#-mapper)

Il va falloir créer un Mapper pour chaque entité que vous allez gérer en BDD. 

Le Mapper aura pour role de recevoir des données brutes sur la forme d'un tableau associatif PHP de la part d'un Repository et lui retournera une instance d'un Objet.

**Exemple** : une AnswerMapper recevra un tableau de la part d'un AnswerRepository qui ressemblera à ceci : 

```php
[
    'id' => 5,
    'title' => 'Programmation Orientée Objet',
    'isCorrect' => true
]
```
et devra **retourner** un **new Answer**

* #### Les Repositories

[Rappel du Mémo](https://github.com/G404-DWWM/POO-Memo?tab=readme-ov-file#-repository)

Il va falloir créer un Repository pour chaque entité que vous allez gérer en BDD. 

Le Repository sera utilisé par le Manager et permettra de réaliser les différentes actions CRUD. Il travaillera de paire avec les Mappers et sera la seule classe à avoir un accès à la base de donnée.

**Exemple d'un processus** :

* On a besoin d'afficher un QCM sur une page. On va donc faire appel à `QcmManager` qui sera capable de nous donner une instance de `Qcm` composé de ses questions et réponses possible.

Pour arriver à ce résultat : 

*  Le **QcmManager** fera appel à `QcmRepository` qui lui-même fera appel à `QcmMapper` pour récupérer une instance de `Qcm`.

* Le **QcmManager** fera appel à `QuestionRepository` qui lui-même fera appel à `QuestionMapper` pour récuperer **l'ensemble des instances** (un tableau) de `Question` qui sont proposées par le `QCM`.

* Le **QcmManager** fera appel à `AnswerRepository` qui lui-même fera appel à `AnswerMapper` **pour chaque Question**. Ce qui permettra de récupérer **l'ensemble des instances** (un tableau) de `Answer` qui sont proposées par chaque `Question`.

* Dès qu'il récupère un ensemble de réponses, le **QcmManager** associera directement ces réponses à une instance de Question :

    ```php
    $question->setAnswers($answers)
    // $question est une instance de Question et on peut lui ajouter un tableau d'Answer (ici $answers). 
    ```

* Quand il aura associé toutes les réponses à leurs questions, le **QcmManager** associera les questions au QCM : 

    ```php
    $qcm->setAnswers($questions)
    ```

* Ainsi il **retournera** l'instance $qcm qui sera composer de ses questions et des réponses possible aux questions.

* On aura plus qu'à utiliser la méthode **generateDisplay()** du manager pour afficher le quiz :

    ```php
    echo $qcmManager->generateDisplay($qcm);
    ```

