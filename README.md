# Sauvegarder une partie avec l'aide de PHP

Pour cet exercice, il s'agit de sauvegarder les résultats d'une partie du jeu (le temps).

## Étapes

- [x] Faire une séparation MVC (header, footer, indexAction et resultsAction)
- [x] Cacher le bouton "Enregistrer" en CSS. Celui-ci doit devenir visible lorsque la partie se termine
- [ ] Lorsque la personne clique sur "Enregistrer", le résultat est placé dans un champ __caché__ du formulaire.
- [ ] Lorsque PHP reçoit le résultat, alors celui-ci est sauvegardé dans un fichier texte (append). Essayez d'avoir un résultat par ligne, ceci rendra le fichier plus rapide à lire (voir étape suivante).
- [ ] Dans le fichier results.php, lire les résultats du fichier texte, puis les affichés dans l'écran


## Fonctions utiles


### Sauvegarder à la fin d'un fichier en PHP

````php
$info = "Hello, there"; // Pour ajouter un saut de ligne : ajouter "\n" à la fin de la ligne
file_put_contents("data/results.txt", $info, FILE_APPEND);
````

### Lire dans un fichier php

````php
$data = file_get_contents("data/results.txt");
$lines = explode("\n", $data); // tableau de lignes

foreach ($lines as $line) {
    ...
}
````

### Avoir la date en PHP

````php
$formattedDate = date("Y-m-d H:i:s", time()); // 2020-12-11 12:43:44
````