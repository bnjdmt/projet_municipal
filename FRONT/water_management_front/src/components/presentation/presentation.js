import { Link } from 'react-router-dom';

const Presentation = () => {
  return (
    <div>
      <nav>
        <ul>
          <li>
            <Link to="/login">Log In</Link>
          </li>
          <li>
            <Link to="/accueil">Accueil - utilisateur</Link>
          </li>
          <li>
            <Link to="/accueil_mel">Accueil - Mel</Link>
          </li>
          <li>
            <Link to="/creer_foyer">Créer Foyer</Link>
          </li>
        </ul>
      </nav>
    </div>
  );
};

export default Presentation;