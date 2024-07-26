<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  
<Card>
  <CardHeader>
    <CardTitle style="font-size:4rem;">HISTOIRE DU CLUB</CardTitle>
  </CardHeader>
  <CardBody>
    <CardSubtitle>UN QUARTIER, UN CLUB, UNE HISTOIRE</CardSubtitle>
    <CardText>Some quick example text to build on the card title and make up the bulk of the card's content.</CardText>
    <Button>Button</Button>
  </CardBody>
  
</Card>
