# Utiliser l'image Node
FROM node:18-alpine

# Définir le répertoire de travail
WORKDIR /usr/src/app

# Copier les fichiers package.json et package-lock.json
COPY package*.json ./

# Installer les dépendances
RUN npm install

# Copier tout le reste des fichiers de l'application
COPY . .

# Exposer le port de développement React
EXPOSE 3000

# Commande pour démarrer l'application
CMD ["npm", "start"]
