# Liste de création

## Les entités de paramétrage non dépendantes d'autres entités

FormuleDeJeu
ModeCalculChampionnat
ModeCompetition
RegleCroix
RepartitionPoints

## Entité de niveau 1 

Club // rattaché à Championnat par une association n-n
Championnat
ReglementChampionnat // lien 1-1 avec Championnat

## Entité de niveau 2 et plus 

PointsClassementEquipe
Joueur // rattaché à Championnat par association n-n
Cible
CibleDeParcours
Parcours
ReglementCompetition
Repere
Competition

## Liste des autres entités - non renseignées par Appfixtures

CarteDeScores
ClassementClub
ClassementJoueur
Equipe
Flight
Score
