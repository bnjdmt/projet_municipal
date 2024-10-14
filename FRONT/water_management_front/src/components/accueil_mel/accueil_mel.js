import '../accueil/accueil.css';
import Navbar from '../navbar_mel/navbar_mel';
import Alertes from '../alertes_recentes/Alertes';
import Conso24h from '../conso24h/conso24h';
import RecommandationsMel from '../recommandations_mel/recommandations_mel';
import DispoEau from '../dispo_eau/dispoEau';

const AccueilMel = () => {
    return (
      <div id='accueil'>
        <Navbar />
        <div id='divCard'>
          <div id='card'>
            <div>
              <Alertes />
              <RecommandationsMel />
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
  
export default AccueilMel;