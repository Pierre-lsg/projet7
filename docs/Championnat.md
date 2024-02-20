Championnat :
- nom 
- description
- saison
- compétition(s)
- classement(s)
- règlement championnat
// Seuls les clubs et joueurs identifiés pour un championnat sont identifiés dans le classement du championnat 
- club/joueur

Classement Club :
- Championnat
- Club
- nombre de points

Classement Joueur :
- Championnat
- joueur
- nombre de points

Règlement Championnat :
- mode de calcul (FFSG2024)
- mode de répartition des points (meilleure place, répartition)
- nombre de compétition (suivant mode de calcul, pour 2024, toutes les étapes comptes)
- points marqués par classement équipe


Compétition
- nom
- description
- parcours
- flight(s)
- règlement de la compétition
- Carte(s) de score

Carte de scores :
// Pour un trou en équipe fdj autre que individuel ou bonus, le score du joueur est celui de l'équipe sur le trou
// S'il manque un joueur dans l'équipe, le score du joueur est automatiquement la croix (par + n ou valeur fixe) pour les trous individuels et 0 pour les trous bonus
// Si une équipe ne réalise pas tous les trous du parcours, le score calculé est le plus défavorable par trou manquant (X ou 0 si bonus)
// Flight et carte de score sont définis simultanément
- Score(s)
- signature

Score :
- cibleDeParcours 
- joueur 
- équipe
- score

ReglementCompétition :
- date de compétition
- date de publication des résultats
- Lieu d'accueil
- mode de compétition (individuel, par équipe)
- nombre de joueurs par équipe
- nombre d'équipe par Flight
- règle valeur de la croix

Flight :
- ordre
- nom
- équipe(s)

// si compétition individuelle - le nom de l'équipe est automatiquement le nom du joueur 
Equipe : 
- nom
- joueur(s)

Joueur :
- prénom
- nom 
- pseudo

Club :
Groupement de joueurs
Engage des équipes dans une compétition


Parcours
- nom
- description
- CibleDeParcours(s)

CibleDeParcours
- cible
- ordre
- formuleDeJeu

Cible (*ou Trou en golf traditionnel*)
- départ, 
- arrivée, 
- hors limite, autres règles ... à venir

Repere
- nom
- description
- latitude
- longitude
- photo

-- 
Définition 

Arbitre : pour une compétition, surveille un trou et note les résultats
Marshall : pour une compétition, surveille un flight et note ses résultats

Une compétition peut être collective ou individuelle
Dans ce dernier cas, l'équipe se résume au jour. 

Pour une compétition collective, un club ne peut engager plus de 'n' équipes. 

