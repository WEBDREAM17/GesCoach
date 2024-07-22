<script>
	import { Container, Image, Col, Row} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  
<Container>
    <Row>
      <Col ><Image fluid alt="This is a fluid Image" src="src/lib/images/4.jpg" />
        <Col style=" margin-top: 30px;  display:flex; align-items:center; height:100px; padding-left: 20px; background-color:black; color:aqua; font-size:2rem;">Actualités</Col>
      </Col>
    </Row>
    <Row>
      <Col xs="7">
        <h1 style="margin-top:30px; margin-bottom:30px;">A Propos de nous</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tenetur in veritatis quasi qui sunt deleniti hic, sint repellat natus repudiandae sed, suscipit consequuntur accusantium enim itaque! Ducimus, sint nostrum. <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nulla provident odio, eveniet labore quod temporibus maxime tenetur qui recusandae illum adipisci esse similique, blanditiis quo officia commodi eum quaerat! <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tenetur in veritatis quasi qui sunt deleniti hic, sint repellat natus repudiandae sed, suscipit consequuntur accusantium enim itaque! Ducimus, sint nostrum. <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nulla provident odio, eveniet labore quod temporibus maxime tenetur qui recusandae illum adipisci esse similique, blanditiis quo officia commodi eum quaerat!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nulla provident odio, eveniet labore quod temporibus maxime tenetur qui recusandae illum adipisci esse similique, blanditiis quo officia commodi eum quaerat! <br><br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia tenetur in veritatis quasi qui sunt deleniti hic, sint repellat natus repudiandae sed, suscipit consequuntur accusantium enim itaque! Ducimus, sint nostrum. <br><br>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi nulla provident odio, eveniet labore quod temporibus maxime tenetur qui recusandae illum adipisci esse similique, blanditiis quo officia commodi eum quaerat!</p>
  
      </Col>
      <Col xs="5"><Image fluid alt="This is a fluid Image" src="src/lib/images/4.png" /></Col>
    </Row>
    <Row>
      <Col><button style="background-color: red; width:300px; height:50px; ">A propos du club "le Parc FC"</button></Col>
    </Row>
    <Row style="height:400px; background-color:black; margin-top:50px;">
      <Col>
        <h1 style="color:white; text-align:center; margin-top:20px;">MATCH OF THE DAY</h1>
      </Col>
    </Row>
    <Row style="display:flex; justify-content:center; margin-top:50px;">
      <Col style="width:350px; display:flex; flex-direction:column; justify-content:center; align-items:center;" >
        <Image style="width:350px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" /><h1 style="margin-top:30px;" >Coach du Mois</h1></Col>
     
        <Col style="width:350px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
         <Image  style="width:350px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" /><h1 style="margin-top:30px;">Joueur du Mois</h1></Col>
     
         <Col style="width:350px; display:flex; flex-direction:column; justify-content:center; align-items:center;">
        <Image style="width:350px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" /><h1 style="margin-top:30px;">Equipe du Mois</h1></Col>
    </Row>
    <Row style="display:flex; justify-content:center; margin-top:50px; height:500px; background-color:gray;">
      <Col xs="4" style="display:flex; background-color:white; height:450px; margin:20px 10px 0px 5px;">
        <h1>News 1</h1>
        <p></p>
      </Col>
      <Col xs="7" style="display:flex; background-color:white; height:450px; margin:20px 10px 10px 5px;">
        <h1>News 1</h1>
        <p></p>
      </Col>
    </Row>
  
    <Row style="display:flex; justify-content:center; align-items:center; margin:50px auto; height:500px; background-color:gray;">
      <h1 style="text-align:center; margin:20px auto;">Évenements</h1>
  
      <Col xs="3" >
        <Image style="width:150px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" />
        <h1>Tournois</h1>
      </Col>
      <Col xs="3" >
        <Image style="width:150px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" />
        <h1>Spécifique</h1>
      </Col>
      <Col xs="3" >
        <Image style="width:150px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" />
        <h1>Stage</h1>
      </Col>
      <Col xs="3" >
        <Image style="width:150px;" thumbnail alt="Il s'agit d'une image miniature" src="src/lib/images/2.png" />
        <h1>Autres</h1>
      </Col>
     
    </Row>
  </Container>
