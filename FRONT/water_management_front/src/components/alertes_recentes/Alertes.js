import './alertes.css';

const Alertes = () => {
  return (
    <div id="alertes">
      <h1 id='titre'>Alertes Récentes</h1>
        <div className='divAlerte'>
            <div class="rond-rouge"></div>
            <p>Fuite détectée : Capteur : cuisine-001</p>
        </div>
            <div className='lignWhite'></div>
        <div className='divAlerte'>
            <div class="rond-vert"></div>
            <p>Fuite résolue : Capteur : douche-001</p>
        </div>
            <div className='lignWhite'></div>
        <div className='divAlerte'>
            <div class="rond-vert"></div>
            <p>Fuite résolue : Capteur : cuisine-001</p>
        </div>
            <div className='lignWhite'></div>
    </div>
  );
};

export default Alertes;