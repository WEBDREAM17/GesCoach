<script lang="ts">
    import { Carousel, CarouselControl, CarouselIndicators, CarouselItem, Row, Col, Button} from '@sveltestrap/sveltestrap';
    const items = [
      'src/lib/images/7.jpg',
      'src/lib/images/9.jpg',
      'src/lib/images/5.jpg'
    ];

    let activeIndex = 0;  
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
        <p style="color: white;padding:10px 40px 0 20px;font-size:1.3rem;">Le Parc Fc est le club de football du quartier populaire du 3eme arrondissement de Marseille "Felix-Pyat". Ce club favorise l'accompagnement sportif et éducatif de chaque enfant. Notre objectif est de développer l'épanouissement, la progression et les aider à cheminer vers la réussite en développant chez chaque individu la confiance en soi, l'estme de soi et la motivation. <br>Pour plus d'infos n'hesiter pas à nous contacter par mail :
            <a href="/">parcfc@aol.com </a></p>
    </div>
  </Carousel>
;
<Row style="margin:25px;">
    <h4>Pourquoi-nous choisir ?</h4>
    <h1 style="color:red;">LES VALEURS DE NOTRE CLUB   </h1>
</Row>
<Row style ="dsiplay:flex; justify-content:center; gap:50px;margin-top:50px;" cols={{ lg: 3, md: 2, sm: 1 }}>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Entrainement</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Respect</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div>
    </Col>

    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Jeunesse</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Performance</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">La scolarité</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div>
    </Col>
    <Col style="display:flex; align-items:center;background-color:white; width:500px; gap:20px; border: 2px solid black;">
        <img style="width:100px;" src="/src/lib/images/1.png" alt="">
        <div style="display:flex; flex-direction:column;"> 
        <h3 style="color:color;">Réussite</h3>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, voluptatem?</p>
        </div> 
    </Col>
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
  