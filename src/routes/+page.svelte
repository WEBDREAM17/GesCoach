<script lang="ts">
  import { Carousel, CarouselControl, CarouselIndicators, CarouselItem, Row, Col, CardHeader, CardTitle} from '@sveltestrap/sveltestrap';
  const items = [
    'src/lib/images/7.jpg',
    'src/lib/images/9.jpg',
    'src/lib/images/5.jpg'
  ];

  let activeIndex = 0; 

</script>

<CardHeader style="background-color:black; margin:20px;">
  <CardTitle style="font-size:4rem; margin: 10px 30px; color:grey;">LE PARC FOOTBALL CLUB, plus qu'un club</CardTitle>
</CardHeader>
<h4 style="margin:20px; color:red;">Notre vision: </h4>
 <Row style="margin:20px;">
 <p>L’école de foot du Parc FC a été créé en mai 2024, avec comme objectif de travailler principalement sur l’attitude des jeunes. Une équipe a de meilleurs résultats lorsque chaque joueur a un bon comportement.
  Il est donc essentiel de mettre l’accent sur le développement personnel de l’enfant. L’apprentissage de la technique, bien qu’important et largement développé aux Parc FC, ne doit pas être le premier critère de sélection.
  Notre volonté est d’uniquement conserver les joueurs qui ont la volonté de progresser dans leur attitude et de travailler sur leur mental.</p>
</Row>
<Carousel style="margin:20px;" {items} bind:activeIndex>
  <CarouselIndicators bind:activeIndex {items} />
  <div class="carousel-inner">
    {#each items as item, index}
      <CarouselItem  bind:activeIndex itemIndex={index}>
        <img style="height:600px;"  src={item} class="d-block w-100" alt="{item} {index + 1}" />
      </CarouselItem>
    {/each}
  </div>
 
  <div style="border:2px solid black;background-color:black;">
      <h4  style="color: red; padding:20px 0 0 20px;">Bienvenue à</h4>
      <h1 style="color: white;padding:10px 0 0 20px;">LE PARC FOOTALL CLUB</h1>
  <p style="color: white;padding:10px 40px 0 20px;font-size:1rem;">Le Parc Football Club est une association sportive implantée dans le quartier populaire du 3ème arrondissement de Marseille "Felix-Pyat". <br><br> Ce club de football favorise l'accompagnement sportif et éducatif de chaque enfant. Notre objectif est de développer l'épanouissement, la progression et la confiance en soi afin de les aider à cheminer vers la réussite. <br><br>A l'école de football du Parc FC, nous nous engageons à cultiver des compétences et des valeurs, aidant nos jeunes joueurs à devenir non seulement d'excellents sportifs, mais aussi des individus équilibrés et responsables. Notre mission va au-delà du terrain de football : nous préparons nos jeunes joueurs pour la vie. <br><br>Pour plus d'infos n'hesiter pas à nous contacter par mail :
          <a href="/">parcfc@aol.com</a></p>
  </div>
</Carousel>
<Row style="margin:25px;">
  <h4>Pourquoi-nous choisir ?</h4>
  <h1 style="color:red;">LES VALEURS DE NOTRE CLUB   </h1>
</Row>
<Row style ="dsiplay:flex; justify-content:center; gap:50px;margin-top:50px;" cols={{ lg: 3, md: 2, sm: 1 }}>
  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="/src/lib/images/1.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">Entrainement</h3>
      <p>Le joueur du Parc aura des séances structurées dans une ambiance positive et amusante. il travaillera sa technique de passe, sa qualité de réception, sa capacité à dribbler et à frapper, sa coordination et d'autres choses encore tout au long de l'année.</p>
      </div>
  </Col>
  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="src/lib/images/5.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">Respect</h3>
      <p>Le respect des règles est le pilier du sport et permet à chacun d'évoluer à son rythme. Même s'il commence par-là, le respect ne se résume pas à des bonjours et autres mercis, c'est un tout qui s'appuie sur le fair-play, le respect de l'arbitre, de ses décisions et de l'adversaire.</p>
      </div>
  </Col>

  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="/src/lib/images/1.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">Jeunesse</h3>
      <p>Le football est bien plus qu'un jeu : c'est un outil puissant pour le développement global des jeunes. En jouant au football, les enfants acquièrent des compétences essentielles, développeunt leur caractère et apprennent des de vie précieuses.</p>
      </div>
  </Col>
  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="/src/lib/images/1.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">Performance</h3>
      <p>Les capacités techniques, tactiques et mentales sont constamment en interaction et jouent sur la performance du joueur. Il est important de travailler ces différents facettes du football afin de permettre aux joueurs de s'exprimer pleinement sur le terrain. le facteur physique est devenu primordial pour que le footballeur, deevenu athlètes, puisse exprimer au mieu ses qualités.</p>
      </div>
  </Col>
  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="src/lib/images/2.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">La scolarité</h3>
      <p>Au delà du talent, du travail acharné et du mental d'acier qu'il faut réunir pour devenir un grand champion, une part de chance et de hasard s'immiscent pour brouiller les cartes de la réussite. les jeunes ont donc intéret à paufiner leur plan B pendant leurs années d'études. C'est pour celà que nous mettons l'accent sur le parcours éducatif de chaque enfant.</p>
      </div>
  </Col>
  <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
      <img style="width:100px;" src="src/lib/images/7.png" alt="">
      <div style="display:flex; flex-direction:column;"> 
      <h3 style="color:color;">Réussite</h3>
      <p>La flexibilité et l'adaptabilité sont des qualités très précieuses pour quelqu'un qui souhaite reussir dès son plus jeune âge. la capacité à s'adapter au changement, à apprendre de nouvelles choses e à relever les défis avec une attitude positive aidera à s'épanouir et à mieux atteindre ses objectifs de carrière.</p>
      </div> 
  </Col>
</Row>


