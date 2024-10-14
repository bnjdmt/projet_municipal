import './formulaire.css';

const FormulaireConnexion = () => {
    return (
        <div>
            <form id='form'>
            <h2 id='title'>Connexion</h2>
                <label htmlFor="identifiant">Numéro Identifiant :</label>
                <input type="identifiant" id="identifiant" name="identifiant" />
                <label htmlFor="password">Mot de passe :</label>
                <input type="password" id="password" name="password" />
                <a href='#'>Mot de passe oublié</a>
                <button id='submit' type="submit">Se connecter</button>
            </form>
        </div>
    );
    }

export default FormulaireConnexion;