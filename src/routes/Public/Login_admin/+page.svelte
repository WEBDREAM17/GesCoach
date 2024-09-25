<script>
import { Card, Table, Label, Input, Image, Col, Row, Button} from "@sveltestrap/sveltestrap";
</script>
<h1>Login Admin</h1>
<Card style="background-color:black;">
  <Row>
    <Col style="margin-top:50px;" sm="12" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Identifiant</Label>
      <Input></Input>
    </Col>
    <Col sm="8" md={{ size: 6, offset: 3 }}>
      <Label style="color:white;">Mot de passe</Label>
      <Input></Input>
    </Col>
    <Col sm="12" md={{ size: 6, offset: 3 }}>
      <a style="color:red;"href="/">Mot de passe oublié</a>
    </Col>
      
      <Col sm="6" md={{ size: 6, offset: 3 }}>
        <Button style="margin-bottom:50px;">Se connecter</Button>
      </Col>
    
  </Row>
</Card>





