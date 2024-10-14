import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './App.css';
import Presentation from './components/presentation/presentation';
import Accueil from './components/accueil/accueil';
import AccueilMel from './components/accueil_mel/accueil_mel';
import AccueilRecommandationsUtilisateur from './components/accueil_recommandations_utilisateur/accueil_recommandations_utilisateur';
import Login from './components/accueil_login/accueil_login';
import CreerFoyer from './components/creer_foyer/creer_foyer';
import AccueilFoyer from './components/accueil_foyer/accueil_foyer';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Presentation />} />
        <Route path="/login" element={<Login />} />
        <Route path="/accueil" element={<Accueil />} />
        <Route path="/accueil_mel" element={<AccueilMel />} />
        <Route path="/accueil_recommandations_utilisateur" element={<AccueilRecommandationsUtilisateur />} />
        <Route path="/creer_foyer" element={<CreerFoyer />} />
        <Route path="/accueil_foyer" element={<AccueilFoyer />} />
      </Routes>
    </Router>
  );
}

export default App;