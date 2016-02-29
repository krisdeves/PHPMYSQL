# PHPMYSQL

Projet B1 : PHP / MySQL / SQL Server
Contexte :
Vous travaillez au service informatique de la start-up CompFundation au sein de laquelle vous
intervenez sur la mise en ligne d'une application internet permettant de mettre en relation des intervenants et des organisation sur des domaines d'applications particuliers.
Dans un premier temps, votre supérieur vous demande de réaliser le paramétrage et la mise en route d'un serveur Apache couplé à un serveur de base de données MySQL et intégrant le moteur PHP.
Pour ce projet, l'aspect ergonomique est essentiel !
Le schéma de la base de données vous est fourni en annexe.
L'entreprise prestataire de services CompFundation est une entreprise de services du numérique implantée à proximité du centre de formation. Elle réalise des développements auprès de clients qu'elle démarche, ou pour ses propres besoins.
Elle compte un effectif de 5 personnes à temps plein qui interviennent dans tous les domaines de l'informatique d'aujourd'hui, et plus particulièrement les développements Web et mobiles.
Problématique du projet
Le choix exclusif des domaines de services pour tous les professionnels impose un travail important sur la reconnaissance de CompFundation par les organisations (entreprises, administrations, ou encore associations) susceptibles de rechercher des intervenants pour leurs projets. Pour maintenir sa place dans le tissu concurrentiel des start-up du domaine des technologies de l’information et de la communication, le directeur général, Alberto G. a décidé de développer un ensemble d'applications destinées à améliorer et faciliter le traitement des mises en relations et des recherches d'intervenants. Compte tenu de la stratégie de diversification géographique, le projet est d'envergure nationale dans un premier temps.
Ce projet aura pour rôle de répondre aux exigences et aux contraintes de la recherche de prestataires. Fraîchement embauché-e par CompFundation, vous intervenez dans plusieurs missions mises en place par CompFundation dans le cadre de ce projet.

Travail à faire (séance 1 et 2) :
La première étape du projet consistera à procéder à l'installation, au paramétrage et aux tests de fonctionnements de la plate forme de développement nécessaire à la réalisation du projet.
La deuxième étape consistera à reproduire le schéma de la base de données réalisée par vos analystes sur votre serveur MySQL et d'en vérifier l'intégrité et la correspondance aux besoins du projet.
La troisième étape consistera à réaliser le maquettage de l'application web en rapport avec les modules demandées pour les missions à suivre.
Pour cela, votre chef de projet vous propose de réaliser les maquettes de vos pages en utilisant un outil de maquettage nommé "Balsamiq Mockups".
A la fin de cette étape, vous devrez fournir un document qui recensera les difficultés que vous avez pu rencontrer lors de l'installation et le paramétrage de la plate-forme de développement et qui donnera un récapitulatif des fonctionnalités et de l'utilité des outils et modules mis en place ainsi qu'un comparatif rapide mais fonctionnel des outils de maquettages (au moins deux dont Balsamiq) que vous aurez pu trouver.
Les exigences de votre chef pour le design de votre site sont les suivantes :


Le site doit être clair, aéré, lisible et s'inscrire dans des tons plutôt chauds
Toutes les pages doivent avoir la même présentation
Le menu principal doit être accessible depuis toutes les pages
Les éditions doivent être au format PDF
Les exports doivent être au format CSV

D'une manière générale, le site devra proposer :
Un bandeau en en-tête d'une hauteur de 200px contenant un logo CompFundation à gauche (largeur maxi de 200px) et un slogan sur la droite.
Un menu de navigation principal horizontal qui permettra d'accéder aux pages correspondantes au fonctionnalités principales (Accueil, Inscription, Recherche, Contact)
Une zone centrale d'au minimum 400 px de haut qui contiendra l'ensemble des données présentées sur le site.
Un bas de page d'une hauteur de 40 px contenant les liens permettant d'accéder aux mentions légales et aux copyrights.
Dans un premier temps, ce site est une application interne qui ne sera ouverte au public que bien plus tard. Il n'est pas prévu que vous mettiez en place d'authentification pour le moment, la seule nécessité sera d'identifier la personne connectée à partir de son email, la gestion du mot de passe sera implémentée plus tard par une méthode de SSO (Single Sign-On).
La maquette réalisée devra être présentée dans le rapport.


Mission 1 : Gestion des inscriptions et de la recherche
Le but de cette mission est de réaliser l'interface nécessaire à :

L'inscription d'un intervenant avec la saisie des domaines d'applications dans lesquels il possède des compétences. Pour cette saisie, les tables utilisées sont : intervenant, domaine, niveau, estcompetent.
L'inscription d'un organisme et au moins d'un contact pour cet organisme, permettant ensuite à celui d'effectuer une recherche d'intervenants. Pour cette saisie, les tables utilisées sont : organisme, contact.

Toutes les informations contenues dans ces tables sont obligatoires à la saisie.
L'inscription d'un intervenant suivra le synopsis suivant :

L'utilisateur accède à la page d'inscription ou il lui sera demandé de choisir entre "Intervenant" ou "Organisme".
L'utilisateur saisi les informations en fonction du profil sélectionné.
Si l'utilisateur est un intervenant, il doit obligatoirement renseigner les domaines de compétences et les niveaux associés.
Si l'utilisateur est un organisme, il devra renseigner les informations d'au moins un contact.
Une fois inscrit, l'utilisateur peut accéder, à n'importe quel moment, à la page de recherches.
La page de recherche demande en premier de choisir le profil et l'adresse mail que l'utilisateur aura enregistré au moment de son inscription.
Une fois ces informations saisies, en fonction du profil, la page affichera les informations suivantes (les tables utilisées sont : recherche, concerne) :
Si l'utilisateur est intervenant, il verra s'afficher les recherches effectuées par des organismes, de la plus récente à la plus ancienne. Cette liste présentera le domaine recherché, le détail de la recherche, le lieu, la date ainsi que le nom de l'organisme.
Si l'utilisateur est un organisme, il verra s'afficher un formulaire lui permettant de saisir les informations pour effectuer une recherche d'intervenants pour un seul domaine. Il devra renseigner toutes les informations utiles. Lors de la validation de la saisie, la recherche est enregistrée dans la base et le résultat affiche la liste des intervenants correspondants en donnant leur nom, prénom, email et téléphone triée par ordre alphabétique du nom et du prénom.
Quel que soit le profil, la liste de résultat doit pouvoir être exportée (par un bouton en bas de
liste) au format CSV ou imprimée (par un autre bouton) au format PDF (utiliser la librairie fpdf).

Travail à faire (séance 3 à 7)
Vous êtes en charge du développement du module décrit.
Vous devez fournir un module fonctionnel, réalisé en équipe, qui fera l'objet d'une démonstration lors de la soutenance.

Mission 2 : Migration de serveur de base de données
Dans le cadre de leur contrat de maintenance avec la société Microsoft, vos collaborateurs vous demandent de réaliser la migration de la base de données de MySQL vers SQL Server pour qu'ils puissent intégrer des développements .NET sur le projet et analyser les avantages / inconvénients.
Vous devrez également écrire et mettre en place le script T-SQL qui permettra, lors de l'enregistrement d'une recherche par un organisme, de générer automatiquement un fichier CSV contenant les résultats de la recherches. Ce sera ce fichier qui sera proposé par les développeur.NET au téléchargement pour l'utilisateur. Le format devra être identique que celui de la première mission.
Pour les tests, vos collaborateurs vous demandent de leur fournir une machine virtuelle sous
Windows 2012 Serveur avec un SQL Server 2014 Express Edition proposant les deux modes
d'authentification (Windows et SQL Server).
Travail à faire (séance 8 et 9)
Vous êtes en charge de la mise en place du serveur et de l'écriture et test du script.
Vous devez fournir un serveur fonctionnel, qui fera l'objet d'une démonstration lors de la soutenance.
