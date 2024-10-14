import './ajout_foyer.css';

const AjoutFoyer = () => {
    return (
        <div>
            <form id='form'>
            <h2 id='title'>Ajouter un foyer</h2>
                <label htmlFor="adresse">Adresse :</label>
                <input type="adresse" id="adresse" name="adresse" />
                <label htmlFor="adherant">Numéro adhérant :</label>
                <input type="adherant" id="adherant" name="adherant" />
                <label htmlFor="piece">Ajouter une pièce :</label>
                <select id="select">
                    <option value="">Ajouter une pièce</option>
                    <option value="option1">Salle de bain</option>
                    <option value="option2">Salon</option>
                    <option value="option3">Cuisine</option>
                    <option value="option4">Toilette</option>
                    <option value="option5">Chambre</option>
                </select>
                <label htmlFor="piece" className='sdb'>Salle de bain</label>
                <select id="select">
                    <option value="option1">Robinet de douche</option>
                    <option value="option2">Baignoire</option>
                </select>
                <button id='submit' type="submit">Valider</button>
            </form>
        </div>
    );
    }

export default AjoutFoyer;