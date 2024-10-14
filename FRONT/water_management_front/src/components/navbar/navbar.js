import Foyer from './foyer';
import Recommandations from './recommandations';
import Assistance from './assistance';
import './navbar.css';
import { Route, Routes, Link } from 'react-router-dom';

const Navbar = () => {
  return (
    <div>
      <nav>
        <ul id='ulNavbar'>
          <img id='logo' src="./images/navbar/Logo_Lille_mais_bleu.svg" alt="Logo"></img>
          <li><Link to="/accueil_foyer" className="nav-link">Foyer</Link></li>
          <li><Link to="/accueil_recommandations_utilisateur" className="nav-link">Recommandations</Link></li>
          <li><Link to="/assistance" className="nav-link">Assistance</Link></li>
        </ul>
        <div id='lignBlue'></div>
      </nav>
    </div>
  );
};

export default Navbar;