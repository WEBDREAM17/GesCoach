<script>
    import { Carousel, CarouselControl, CarouselIndicators, CarouselItem, Row, Col,} from '@sveltestrap/sveltestrap';
    import { onMount } from 'svelte';
    import { replaceState } from '$app/navigation';

    onMount(async () => {
      console.log('onMount');
      replaceState.bind('/Accueil');
    });

    const items = [
      '/images/7.jpg',
      '/images/9.jpg',
      '/images/5.jpg'
    ];

    let activeIndex = 0; 
  </script>
   <div class="cardHeader">
    <h1 class="title">NOTRE VISION </h1>
  </div>
    <h4>Le Parc Football Club, plus qu'un club</h4>
   <p>L’école de foot du Parc FC a été créé en mai 2024, avec comme objectif de travailler principalement sur l’attitude des jeunes. Une équipe a de meilleurs résultats lorsque chaque joueur a un bon comportement.
    Il est donc essentiel de mettre l’accent sur le développement personnel de l’enfant. L’apprentissage de la technique, bien qu’important et largement développé aux Parc FC, ne doit pas être le premier critère de sélection.
    Notre volonté est d’uniquement conserver les joueurs qui ont la volonté de progresser dans leur attitude et de travailler sur leur mental.</p>
   
  <Carousel {items} bind:activeIndex>
    <CarouselIndicators bind:activeIndex {items} />
    <div class="carousel-inner">
      {#each items as item, index}
        <CarouselItem  bind:activeIndex itemIndex={index}>
          <img src={item} class="d-block w-100" alt="{item} {index + 1}" />
        </CarouselItem>
      {/each}
    </div>
   
    <div class="card">
        <h4>Bienvenue à</h4>
        <h2>LE PARC FOOTALL CLUB</h2>
    <p class="info">Le Parc Football Club est une association sportive implantée dans le quartier populaire du 3ème arrondissement de Marseille "Felix-Pyat". <br><br> Ce club de football favorise l'accompagnement sportif et éducatif de chaque enfant. Notre objectif est de développer l'épanouissement, la progression et la confiance en soi afin de les aider à cheminer vers la réussite. <br><br>A l'école de football du Parc FC, nous nous engageons à cultiver des compétences et des valeurs, aidant nos jeunes joueurs à devenir non seulement d'excellents sportifs, mais aussi des individus équilibrés et responsables. Notre mission va au-delà du terrain de football : nous préparons nos jeunes joueurs pour la vie. <br><br>Pour plus d'infos n'hesiter pas à nous contacter par mail :
            <a href="/">parcfc@aol.com</a></p>
    </div>
  </Carousel>
<div style="margin:25px;">
    <h4>Pourquoi-nous choisir ?</h4>
    <h1>LES VALEURS DE NOTRE CLUB </h1>
</div>
<Row style ="dsiplay:flex; justify-content:center; gap:50px;margin-top:50px;" cols={{ lg: 3, md: 2, sm: 1 }}>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3>Entrainement</h3>
        <p>Le joueur du Parc FC aura des séances structurées dans une ambiance positive et amusante. il travaillera sa technique de passe, sa qualité de réception, sa capacité à dribbler et à frapper, sa coordination et d'autres choses encore tout au long de l'année.</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3>Respect</h3>
        <p>Le respect des règles est le pilier du sport et permet à chacun d'évoluer à son rythme. Même s'il commence par-là, le respect ne se résume pas à des bonjours et autres mercis, c'est un tout qui s'appuie sur le fair-play, le respect de l'arbitre, de ses décisions et de l'adversaire.</p>
        </div>
    </Col>

    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3>Jeunesse</h3>
        <p>Le football est bien plus qu'un jeu : c'est un outil puissant pour le développement global des jeunes. En jouant au football, les enfants acquièrent des compétences essentielles, développeunt leur caractère et apprennent des codes de vie précieux.</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3>Performance</h3>
        <p>Les capacités techniques, tactiques et mentales sont constamment en interaction et jouent sur la performance du joueur. Il est important de travailler ces différentes facettes du football afin de permettre aux joueurs de s'exprimer pleinement sur le terrain. le facteur physique est devenu primordial pour que le footballeur, deevenu athlètes, puisse exprimer au mieu ses qualités.</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img  src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3>La scolarité</h3>
        <p>Au delà du talent, du travail acharné et du mental d'acier qu'il faut réunir pour devenir un grand champion, une part de chance et de hasard s'immiscent pour brouiller les cartes de la réussite. les jeunes ont donc intéret à paufiner leur plan B pendant leurs années d'études. C'est pour celà que nous mettons l'accent sur le parcours éducatif de chaque enfant.</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img src="/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 >Réussite</h3>
        <p>La flexibilité et l'adaptabilité sont des qualités très précieuses pour quelqu'un qui souhaite reussir dès son plus jeune âge. la capacité à s'adapter au changement, à apprendre de nouvelles choses e à relever les défis avec une attitude positive aidera à s'épanouir et à mieux atteindre ses objectifs de carrière.</p>
        </div> 
    </Col>
  </Row>
 
  <style>
     body {
      
      overflow: auto;
      height:auto;
      }
      
      .cardHeader{
      border :solid 3px rgb(182, 219, 252);
      padding: 20px 10px;
     
    }
    .title {
      font-size:5rem;
       margin: 20px 30px; 
       color:black;
    }
    .cardBody {
      margin: 10px 30px;
    }
    h4{
      margin: 20px 50px; 
      font-size:2rem; 
      color:rgb(182, 219, 252);
    }
    p{
      font-size:1.2rem;
      margin:20px;
  
    }
    .info {
      font-size:1.2rem;
      margin:20px 50px;
      color: white;
    }
    img {
      height:50px;
    }
    .d-block {
      height: auto;
    }
    h1 {
      margin-top: 50px;
      text-align: center;
      padding: 20px 10px;
    }
    h3 {
      color:blue;
    }
    .card {
      border:2px solid black;
      background-color:black;
    }
    h2 {
      color: white;
      margin:20px 50px;
    }
  </style>