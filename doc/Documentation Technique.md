
#Conception

##Back Office
BackOffice standard de gestion :

 1. Gestion des produits
 2. Gestion des Rooms ( zone de stockage )
 3. Gestion du stock de produits par Room

##Front Office

##Commande client
 1. L'utilisateur ( une fois connecté ) peux créer une commande
	 
 2.  le système le redirige sur sa commande en cours, et génère un lien de partage le plus sécurisé possible avec une key de 40 caractères :
 `order/complete/623dc3c28b609488253443963f5c6b7405f3cd4a/5` 
  il peut ensuite envoyer par émail ou autre le lien de la commande afin que des collègues choisissent eux aussi leurs plats.

3. Après cela l'utilisateur peux ( uniquement l'utilisateur qui à effectué la commande ) Valider et payer,  le script définie alors quels espace de stockage ont les produits commandé en stock et lequel est le plus proche de l'adresse de livraison.
 
 4. La commande est ensuite enregistrée et le stock de la room est décrémenté en fonction de la commande

