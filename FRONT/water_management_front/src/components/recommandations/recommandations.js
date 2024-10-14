import './recommandations.css';

const Recommandations = () => {
  return (
    <div id="recommandations">
      <h1 id='titre'>Recommandations</h1>
        <div className='divRecommandations'>
            <p className='exclamation'>!</p>
            <p>Il est recommandé lorem ipsum</p>
        </div>
            <div className='lignWhite'></div>
        <div className='divRecommandations'>
            <p className='exclamation'>!</p>
            <p>Il est recommandé lorem ipsum</p>
        </div>
            <div className='lignWhite'></div>
        <div className='divRecommandations'>
            <p className='exclamation'>!</p>
            <p>Il est recommandé lorem ipsum</p>
        </div>
            <div className='lignWhite'></div>
    </div>
  );
};

export default Recommandations;