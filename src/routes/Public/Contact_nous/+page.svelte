<script>
	import { Image,Col,Row,FormGroup, Input, Label, Button  } from '@sveltestrap/sveltestrap';
</script>
<h1 style="margin: 30px 0;">CONTACT</h1>
<Image fluid alt="This is a fluid Image" src="/src/lib/images/11.jpg" />
<Row>
    <Col style="margin: 20px; border: 1px solid black;" xs="5" sm="4"><img src="" alt="">Mail</Col>
    <Col style="margin: 20px; border: 1px solid black;" xs="5" sm="4"><img src="" alt="">Adresse du stade</Col>
    <Col style="margin: 20px; border: 1px solid black;" xs="5" sm="4"><img src="" alt="">Téléphone</Col>
</Row>
<Row>
  <Col xs="6"><Input type="text" placeholder="Votre nom" /></Col>
  <Col xs="6"><Input type="email" placeholder="Votre email" /></Col>
</Row>
<Row style="margin-top: 30px;">
  <Col><Input type="textarea" placeholder="textarea placeholder" /></Col>
</Row>
<Button color="primary">Envoyer</Button>




