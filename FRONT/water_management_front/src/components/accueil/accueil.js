import './accueil.css';
import Navbar from '../navbar/navbar';
import Alertes from '../alertes_recentes/Alertes';
import Conso24h from '../conso24h/conso24h';
import Recommandations from '../recommandations/recommandations';
import DispoEau from '../dispo_eau/dispoEau';

const Accueil = () => {
    return (
      <div id='accueil'>
        <Navbar />
        <div id='divCard'>
          <div id='card'>
            <div>
              <Alertes />
              <Recommandations />
            </div>
            <div>
              <Conso24h />
              <DispoEau />
            </div>
          </div>
        </div>
      </div>
    );
  };
  
  export default Accueil;