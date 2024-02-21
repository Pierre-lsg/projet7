# Liste de création

## Les entités de paramétrage non dépendantes d'autres entités

FormuleDeJeu
ModeCalculChampionnat
ModeCompetition
RegleCroix
RepartitionPoints

## Entité de niveau 1 

Club // rattaché à Championnat par une association n-n : en cours
Championnat
ReglementChampionnat // lien 1-1 avec Championnat

## Entité de niveau 2 et plus 

PointsClassementEquipe
Joueur // rattaché à Championnat par association n-n : en cours

## Liste de toutes les entités - supprimer lorsque toutes réparties

CarteDeScores
Cible
CibleDeParcours
ClassementClub
ClassementJoueur
Competition
Equipe
Flight
Parcours
ReglementCompetition
Repere
Score
