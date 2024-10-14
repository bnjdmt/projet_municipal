import React, { useState } from 'react';
import './foyer.css';

const Foyer = () => {
    const [selectedAddress, setSelectedAddress] = useState('');
   
    
    return (
        <div id='pageFoyer'><select className='selectAddress' onChange={e => setSelectedAddress(e.target.value)} name={'adresse'}>
            <option value="" id='rien'>Sélectionnez adresse</option>
            <option value=" 113 rue jules Guesdes" id='adresse'>113 rue jules Guesdes</option>
        </select>
        
        {selectedAddress === "" ?(
        <><div className='paragrapheFoyer'><img className='eau' src="./images/foyer/eautp.png"></img><p className='descriptionFoyer'>Gérer la consommation d'eau à la maison de manière responsable est essentiel pour préserver cette ressource précieuse.<br></br><br></br>
                    Chaque goutte économisée contribue non seulement à réduire vos factures, mais aussi à protéger notre environnement pour les générations futures.<br></br><br></br>
                    En adoptant des gestes simples comme réparer les fuites, limiter le temps passé sous la douche, ou encore utiliser des appareils économes en eau, vous pouvez faire une grande différence.<br></br><br></br>
                    Ensemble, agissons pour un avenir durable en prenant soin de notre ressource la plus vitale : l'eau.
                </p></div></>): (
                    <><><><><div id='divBtnAdd'>
                        <button className='ajoutFoyer'> + Ajouter un foyer</button>
                        </div>
                    <div className='paragrapheFoyer'> 
                    <img className='camembert' src="./images/foyer/camembert.png"></img>
                    <div className='alignementConso'>
                            <h4 id="Conso">Ma consommation</h4>
                            <div className='descriptionCamembert'>
                              
                                  <div className='ligneConso'><div className='carreOrange'></div><p className='pieceLigne'>Salle de bain.</p></div>  
                                  <div className='ligneConso'> <div className='carreJaune'></div><p> Cuisine.</p></div> 
                                  <div className='ligneConso'><div className='carreBleu'></div><p>Jardin.</p></div> 
                                  <div className='ligneConso'> <div className='carreVert'></div><p>Toilettes.</p> </div> 
                                </div>
                        </div>
                    </div>
                    </>
                        <button className='suiviConso'> Gérer ma consommation</button>
                    </><div className='alerte'>
                            <h1 id='titreFoyer'>Mes alertes</h1>
                            <div className='alerteStatut'>
                            <div className='pointvert'>.</div>
                                <p>Fuites - Résolue  : Capteur : cuisine-001</p>
                            </div>
                            <div className='ligne'></div>
                            <div className='alerteStatut'>
                                <div className='pointvert'>.</div>
                                <p>Fuites - Résolue  : Capteur : cuisine-001</p>
                            </div>
                            <div className='ligne'></div>
                            <div className='alerteStatut'>
                            <div className='pointvert'>.</div>
                                <p>Fuites - Résolue  : Capteur : cuisine-001</p>
                            </div>
                            <div className='ligne'></div>
                            <div className='alerteStatut'>
                                <div className='pointrouge'>.</div>
                                <p>Fuite détectée : Capteur : cuisine-001</p>
                            </div>
                            <div className='ligne'></div>
                        </div>
                        </><div className='capteur'>
                            <h1 id='titreFoyer'>Mes capteurs</h1>
                            
                        </div>
                        </>
       )
        }
        </div>

    );
}

export default Foyer;