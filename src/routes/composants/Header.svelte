<script>
	import {
		Collapse,
		Nav,
		Navbar,
		NavbarBrand,
		NavbarToggler,
		NavItem,
		NavLink
	} from '@sveltestrap/sveltestrap';

	let isOpen = false;

	function toggle() {
		isOpen = !isOpen;
	}
</script>

<Navbar color="dark" theme="dark">
	<NavbarBrand href="/" class="me-auto">GesCoach</NavbarBrand>
	<NavbarToggler on:click={toggle} class="me-2" />
	<Collapse {isOpen} navbar>
		<Nav navbar>
			<NavItem>
				<NavLink href="about" on:click={toggle}>About</NavLink>
			</NavItem>
			<NavItem>
				<NavLink href="Home" on:click={toggle}>Home</NavLink>
			</NavItem>
			<NavItem>
				<NavLink href="Liste_joueurs" on:click={toggle}>Liste des joueurs</NavLink>
			</NavItem>
			<NavItem>
				<NavLink href="creation_equipes" on:click={toggle}>Espace Equipes</NavLink>
			</NavItem>
			<NavItem>
				<NavLink href="creation_evenement" on:click={toggle}>Espace Évènements</NavLink>
			</NavItem>
			<NavItem>
				<NavLink href="creation_personne" on:click={toggle}>Creation personne</NavLink>
			</NavItem>
		</Nav>
	</Collapse>
</Navbar>
