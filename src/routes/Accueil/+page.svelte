<script lang="ts">
    import { Carousel, CarouselControl, CarouselIndicators, CarouselItem, Row, Col, Button, ButtonGroup} from '@sveltestrap/sveltestrap';
    const items = [
      'src/lib/images/7.jpg',
      'src/lib/images/9.jpg',
      'src/lib/images/5.jpg'
    ];
    let activeIndex = 0; 


    const sizeMap = ['lg'];

    const sizeToColorMap = {
    sm: 'primary',
    md: 'warning',
    lg: 'danger'
  };
  </script>
  <Carousel style="display:flex; justify-content:center;" {items} bind:activeIndex>
    <CarouselIndicators bind:activeIndex {items} />
    <div style="width:800px;" class="carousel-inner">
      {#each items as item, index}
        <CarouselItem  bind:activeIndex itemIndex={index}>
          <img src={item} class="d-block w-100" alt="{item} {index + 1}" />
        </CarouselItem>
      {/each}
    </div>
    <div style="border:2px solid black; width:800px; background-color:black;">
        <h4  style="color: red; padding:20px 0 0 20px;">Bienvenue à</h4>
        <h1 style="color: white;padding:10px 0 0 20px;">LE PARC FOOTALL CLUB</h1>
    <p style="color: white;padding:10px 40px 0 20px;font-size:1rem;">Le Parc Fc est le club de football du quartier populaire du 3eme arrondissement de Marseille "Felix-Pyat". <br><br> Ce club favorise l'accompagnement sportif et éducatif de chaque enfant. Notre objectif est de développer l'épanouissement, la progression et les aider à cheminer vers la réussite en développant chez chaque individu la confiance en soi, l'estme de soi et la motivation. <br><br>A l'école de football du Parc FC, nous nous engageons à cultiver des compétences et des valeurs, aidant nos jeunes joueurs à devenir non seulement d'excellents sportifs, mais aussi des individus équilibrés et responsables. Notre mission va au-delà du terrain de football : nous préparons nos jeunes joueurs pour la vie. <br><br>Pour plus d'infos n'hesiter pas à nous contacter par mail :
            <a href="/">parcfc@aol.com </a></p>
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
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
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
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">La scolarité</h3>
        <p>Au delà du talent, du travail acharné et du mental d'acier qu'il faut réunir pour devenir un grand champion, une part de chance et de hasard s'immiscent pour brouiller les cartes de la réussite. les jeunes ont donc intéret à paufiner leur plan B pendant leurs années d'études. C'est pour celà que nous mettons l'accent sur le parcours éducatif de chaque enfant.</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Réussite</h3>
        <p>La flexibilité et l'adaptabilité sont des qualités très précieuses pour quelqu'un qui souhaite reussir dès son plus jeune âge. la capacité à s'adapter au changement, à apprendre de nouvelles choses e à relever les défis avec une attitude positive aidera à s'épanouir et à mieux atteindre ses objectifs de carrière.</p>
        </div> 
    </Col>
  </Row>
 
  <Row style="margin-top:70px;">
    {#each sizeMap as size}
  <ButtonGroup {size}>
    <Button color={sizeToColorMap[size]} href="Nos equipes" on:click={toggle}>Nos equipes</Button>
    <Button color={sizeToColorMap[size]} href="Le Parc Fc" on:click={toggle}>Le Parc FC</Button>
    <Button color={sizeToColorMap[size]} href="/" on:click={toggle}>Planning des entraînements</Button>
    <Button color={sizeToColorMap[size]} href="/" on:click={toggle}>Inscriptions 24/25</Button>
    <Button color={sizeToColorMap[size]} href="/" on:click={toggle}>Notre staff </Button>
    <Button color={sizeToColorMap[size]} href="Nos evenements" on:click={toggle}>Nos contacts</Button>
  </ButtonGroup>
{/each}
  </Row>
 
  <Carousel style="width:1600px; margin:100px auto;" {items} bind:activeIndex>
    <div class="carousel-inner">
      {#each items as item, index}
        <CarouselItem style="height:800px;" bind:activeIndex itemIndex={index}>
          <img src={item} class="d-block w-100" alt="{item} {index + 1}"/>
        </CarouselItem>
        
      {/each}
    </div>
    <CarouselControl direction="prev" bind:activeIndex {items} />
    <CarouselControl direction="next" bind:activeIndex {items} />
  </Carousel>
  