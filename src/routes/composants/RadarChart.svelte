<script>
    import { Radar } from 'svelte-chartjs';
    export let dataColors;
    import { browser } from "$app/environment"
    import { onMount } from "svelte";

    export let id_joueur;
    
    /**
	 * @type {number[]}
	 */
    let eval1FormatteGraph = [];
	/**
	 * @type {number[]}
	 */
	let eval2FormatteGraph = [];
	let eval3FormatteGraph = [];

    let liste_eval = [];
    let _servicepath = 'http://localhost/webservice/';
	let compteur = 0;
	/**
	 * @type {any[]}
	 */
	let eval1 = [];
	/**
	 * @type {any[]}
	 */
	let eval2 = [];
	let eval3 = [];

    import {
        Chart as ChartJS,
        Title,
        Tooltip,
        Legend,
        PointElement,
        RadialLinearScale,
        LineElement,
    } from 'chart.js';

    ChartJS.register(
        Title,
        Tooltip,
        Legend,
        PointElement,
        RadialLinearScale,
        LineElement
    );

    onMount ( async()=> {        
        await recupererEval();
	})

    const notifyLoaded = () => {
        console.log('loaded!')
    }
    
    const recupererEval = async () => {
		try {
			//On crée le User
			const updateRoute = _servicepath + 'recuperer_eval_idjoueur.php';
			const data = new FormData();
			data.append('id_joueur', id_joueur);
			let res = await fetch(updateRoute, {
				method: 'POST',
				body: data
			});

			res = await res.json();
			// @ts-ignore
			if (res.status == '1') {
				console.log(res.data)
				liste_eval = res.data;
				
				liste_eval.forEach(evalu => {
					if(compteur == 0)
					{
						console.log('eval :');
						console.log(evalu);
						eval1 = evalu;
						eval1FormatteGraph[0] = 6;
						eval1FormatteGraph[1] = 8;
						eval1FormatteGraph[2] = 7;
						eval1FormatteGraph[3] = 5; 
						console.log(eval1FormatteGraph);
					}
					if(compteur == 1)
					{
						eval2 = evalu;
						eval2FormatteGraph[0] = evalu.noteAssiduite;
						eval2FormatteGraph[1] = evalu.noteVitesse;
						eval2FormatteGraph[2] = 4;
						eval2FormatteGraph[3] = 4; 
					}
					if(compteur == 2)
					{
						eval3 = evalu;
						eval3FormatteGraph[0] = evalu.noteAssiduite;
						eval3FormatteGraph[1] = evalu.noteVitesse;
						eval3FormatteGraph[2] = 4;
						eval3FormatteGraph[3] = 4; 
					}
					compteur = compteur+1;
				});
				
			} else {
				// @ts-ignore
				console.log(res.message);
			}
		} catch (error) {
			console.log(error);
		}
	};

    function getChartColorsArray(colors) {
        if (browser) {
            return colors.map(function (value) {
                var newValue = value.replace(" ", "");
                if (newValue.indexOf(",") === -1) {
                    var color = getComputedStyle(
                        document.documentElement
                    ).getPropertyValue(newValue);
                    if (color.indexOf("#") !== -1)
                        color = color.replace(" ", "");
                    if (color) return color;
                    else return newValue;
                } else {
                    var val = value.split(",");
                    if (val.length === 2) {
                        var rgbaColor = getComputedStyle(
                            document.documentElement
                        ).getPropertyValue(val[0]);
                        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
                        return rgbaColor;
                    } else {
                        return newValue;
                    }
                }
            });
        }
    }

    var radarChartColors = getChartColorsArray(dataColors);
    var data={};
    
    console.log('id_joueur radar : ' + id_joueur);
    if (radarChartColors) {

        data = {
            labels: [
                "Endurance",
                "Vitesse",
                "Coordination",
                "Force",
            ],
            datasets: [
                {
                    label: "Eval 1",
                    backgroundColor: radarChartColors[0],
                    borderColor: radarChartColors[1], //"#2ab57d",
                    pointBackgroundColor: radarChartColors[1], //"#2ab57d",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: radarChartColors[1], //"#2ab57d",
                    data: eval1FormatteGraph,
                },
                {
                    label: "Eval 2",
                    backgroundColor: radarChartColors[2], //"rgba(81, 86, 190, 0.2)",
                    borderColor: radarChartColors[3], //"#5156be",
                    pointBackgroundColor: radarChartColors[3], //"#5156be",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: radarChartColors[3], //"#5156be",
                    data: eval2FormatteGraph,
                },
            ],
        };
    }
</script>

<Radar {data} option={{ responsive: true }} class="chartjs-chart" />
