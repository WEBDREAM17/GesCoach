<script>
	import { Container, Image, Col, Row, Card, CardBody,CardHeader, CardTitle, CardSubtitle,Button,CardText} from "@sveltestrap/sveltestrap";
	import { onMount } from "svelte";
    import { page} from '$app/stores';
</script>  
<Card>
  <CardHeader>
    <CardTitle style="font-size:4rem; margin: 10px 30px;">HISTOIRE DU CLUB</CardTitle>
  </CardHeader>
  <CardBody>
    <CardSubtitle style="color:aqua; font-size:2.5rem; margin-left:30px;">LE PARC FC</CardSubtitle>
    Un quartier, un club, une histoire
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;; ">
      <p style="font-size:1.2rem; width:700px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, ullam fugiat quis iure vel accusantium eligendi adipisci, facere modi aperiam, non et? Quos magni architecto perferendis quas blanditiis ratione sapiente alias dignissimos, rerum fugit voluptas numquam soluta? Fuga, beatae tempore. Vitae error soluta eaque totam qui pariatur quas deleniti commodi, cum, nisi eius veritatis tenetur temporibus minus iure alias veniam sit excepturi deserunt reiciendis, perspiciatis illum nihil aut. Quasi perspiciatis ut, placeat dolore ratione minus sequi error repellendus veniam vitae saepe accusantium ipsam. Facere ducimus a veritatis, dolor, quisquam doloremque delectus qui natus dicta officia repellendus error, placeat molestias. Nisi.</p>
      <img src="src/lib/images/20.png" alt="">
    </CardText>
    <CardText style="display:flex; align-items:center; justify-content:space-between;margin: 10px 30px;; ">
      <img src="src/lib/images/20.png" alt="">
      <p style="font-size:1.2rem; width:700px; margin: 10px 30px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, ullam fugiat quis iure vel accusantium eligendi adipisci, facere modi aperiam, non et? Quos magni architecto perferendis quas blanditiis ratione sapiente alias dignissimos, rerum fugit voluptas numquam soluta? Fuga, beatae tempore. Vitae error soluta eaque totam qui pariatur quas deleniti commodi, cum, nisi eius veritatis tenetur temporibus minus iure alias veniam sit excepturi deserunt reiciendis, perspiciatis illum nihil aut. Quasi perspiciatis ut, placeat dolore ratione minus sequi error repellendus veniam vitae saepe accusantium ipsam. Facere ducimus a veritatis, dolor, quisquam doloremque delectus qui natus dicta officia repellendus error, placeat molestias. Nisi.</p>
    </CardText>
    <Button style="width:400px; margin-left:30px; color:aqua; font-size:2rem;" >S'inscrire</Button>
  </CardBody>
  
</Card>
