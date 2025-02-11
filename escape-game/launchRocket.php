<div class="container">
  <!-- Sky -->
  <div class="sky"></div>

  <!-- Space Shuttle -->
  <div class="space-shuttle-container">
    <div class="rocket">
      <!-- Tank -->
      <div class="tank-connector"></div>
      <div class="tank">
        <div class="tank-ring-frame"></div>
      </div>

      <!-- Rocket -->
      <div class="left-rocket"></div>
      <div class="left-rocket-engine"></div>
      <div class="right-rocket"></div>
      <div class="right-rocket-engine"></div>
    </div>

    <!-- Orbiter -->
    <div class="orbiter">
      <div class="wing-bottom"></div>
      <div class="wing"></div>
      <div class="fuselage"></div>
      <div class="fuselage-window"></div>
      <div class="cabin"></div>
      <div class="cargo-bay"></div>
      <div class="elevon"></div>
      <div class="elevon-left"></div>
      <div class="elevon-right"></div>
      <div class="aft-fuselage-block"></div>
      <div class="main-engine-left-connector"></div>
      <div class="main-engine-left"></div>
      <div class="main-engine-right-connector"></div>
      <div class="main-engine-right"></div>
      <div class="main-engine-top-connector"></div>
      <div class="main-engine-top"></div>
      <div class="maneuvering-engine-right"></div>
      <div class="maneuvering-engine-left"></div>
      <div class="vertical-stabilizer"></div>
      <div class="aft-fuselage"></div>
    </div>

    <!-- Rocket Exhaust -->
    <div class="solid-rocket-booster-exhaust"></div>
    <div class="main-engine-exhaust"></div>
  </div>
  <!-- Water Clouds -->
  <div class="water-clouds"></div>
</div>

<style media="screen">
/* Color Palette */
:root {
--dark-gray: #868689;
--red: #833111;
--black: #565656;
--gun-metal: #2c3539;
--off-white: #ecece9;
--silver: #dcdcd7;
--beige: #dbcac3;
--gray: #eaeae6;
--dark-green: #515f56;
--orange: #cc9339;
}

/* Sky Gradient */
.sky {
position: absolute;
width: 500px;
height: 1000px;
top: 0;
left: 0;
background: linear-gradient(
	180deg,
	#000e34,
	#002e88,
	#0552c0,
	#0780e6,
	#28baff
);
animation: sky 7s ease-in infinite;
}

@keyframes sky {
from {
	top: -500px;
}
to {
	top: 0px;
}
}

/* Water Clouds */
.water-clouds {
position: absolute;
width: 800px;
height: 500px;
top: 0px;
left: -40px;
background: transparent;
}

.water-clouds::before {
content: "";
position: absolute;
width: 700px;
height: 400px;
top: 100px;
left: -30px;
background: rgb(169, 169, 169);
clip-path: path(
	"M -40 400 C 1 17 18 60 115 228 S 205 126 255 373 C 279 190 330 144 407 258 S 647 -183 600 400 Z"
);
animation: water-cloud-1 7s ease-in infinite;
}

.water-clouds::after {
content: "";
position: absolute;
width: 700px;
height: 200px;
top: 300px;
left: 0px;
background: rgb(238, 238, 238);
clip-path: path(
	"M -40 200 C 1 17 100 70 138 138 S 211 59 243 167 C 257 112 347 63 384 117 S 494 -94 600 200 Z"
);
animation: water-cloud-2 7s ease-out infinite;
}

@keyframes water-cloud-1 {
from {
	opacity: 0.7;
	top: 100px;
	left: 0px;
}
20% {
	left: -20px;
}
40% {
	left: 20px;
}
60% {
	left: -20px;
}
to {
	opacity: 0;
	top: 500px;
	left: 0px;
}
}

@keyframes water-cloud-2 {
from {
	opacity: 0.9;
	left: 0px;
	top: 300px;
}
20% {
	left: 10px;
}
40% {
	left: -10px;
}
60% {
	left: 10px;
	opacity: 0.3;
}
to {
	opacity: 0;
	left: 0px;
	top: 400px;
}
}

/* Space Shuttle Container */
.space-shuttle-container {
position: absolute;
top: 0px;
left: 10px;
animation: space-shuttle 7s ease-in infinite;
}

@keyframes space-shuttle {
from {
	top: 0px;
	opacity: 1;
}
to {
	top: -495px;
	opacity: 0.4;
}
}

/* Solid Rocket Booster Exhaust (SRB) */
.solid-rocket-booster-exhaust {
position: absolute;
width: 46px;
height: 300px;
top: 480px;
left: 152px;
background: linear-gradient(
	to bottom,
	var(--red),
	var(--orange) 5%,
	var(--off-white),
	transparent
);
}

.solid-rocket-booster-exhaust::before {
content: "";
position: absolute;
width: 46px;
height: 300px;
top: 0px;
left: 115px;
background: linear-gradient(
	to bottom,
	var(--red),
	var(--orange) 5%,
	var(--off-white),
	transparent
);
}

/* Main Engine Exhaust */

.main-engine-exhaust {
position: absolute;
width: 23px;
height: 70px;
top: 477.5px;
left: 205px;
background: linear-gradient(
	to bottom,
	var(--red),
	var(--orange) 20%,
	transparent
);
border-radius: 0 0 200px 200px;
animation: srb 1s linear infinite;
}

.main-engine-exhaust::before {
content: "";
position: absolute;
width: 23px;
height: 70px;
top: 0px;
left: 30px;
background: linear-gradient(
	to bottom,
	var(--red),
	var(--orange) 20%,
	transparent
);
border-radius: 0 0 200px 200px;
}

/* Shake Effect */
.rocket,
.orbiter,
.main-engine-exhaust,
.solid-rocket-booster-exhaust {
animation: shake 0.5s linear infinite;
}

@keyframes shake {
from {
	transform: translateX(0);
}
50% {
	transform: translateX(1px);
}
to {
	transform: translateX(0);
}
}

/***********/
/* Rockets */
/***********/

/* Tank */
.tank {
position: absolute;
width: 75px;
height: 290px;
top: 112px;
left: 195px;
background: linear-gradient(to right, var(--orange), var(--red));
}

/* Tank tip */
.tank::before {
content: "";
position: absolute;
width: 75px;
height: 87px;
top: -87px;
left: 0px;
background-image: linear-gradient(to right, var(--orange), var(--red));
clip-path: path("M 37.5,0 C 0,39 0,82 0,87 L 75,87 C 75,82 75,39 37.5,0");
}

/* Tank round bottom */
.tank::after {
content: "";
position: absolute;
width: 75px;
height: 40px;
top: 270px;
left: 0;
background-image: linear-gradient(to right, var(--orange), var(--red));
border-radius: 50%;
}

/* Tank connector */
.tank-connector {
position: absolute;
width: 4px;
height: 8px;
background: var(--dark-gray);
top: 162px;
left: 192px;
box-shadow: 77px 0px 0 0 var(--dark-gray);
}

.tank-connector::before {
content: "";
position: absolute;
width: 4px;
height: 5px;
background: inherit;
top: 235px;
left: 0px;
box-shadow: 77px 0px 0 0 var(--dark-gray);
}

/* Tank ring frame */
.tank-ring-frame {
position: absolute;
width: 73px;
height: 62px;
top: 26px;
left: 0px;
border: solid 1px var(--orange);
background-image: repeating-linear-gradient(
	to right,
	var(--orange) 1% 2%,
	transparent 2% 4%
);
}

/* Left Rocket */
.left-rocket {
position: absolute;
width: 32.5px;
height: 302px;
top: 159px;
left: 160px;
background: linear-gradient(
		to bottom,
		transparent 3px,
		var(--black) 3px,
		var(--black) 6px,
		transparent 6px,
		transparent 25px,
		var(--dark-gray) 25px,
		var(--dark-gray) 27px,
		transparent 27px,
		transparent 28px,
		var(--black) 28px,
		var(--black) 30px,
		transparent 30px,
		transparent 62px,
		var(--dark-gray) 62px,
		var(--dark-gray) 64px,
		var(--black) 64px,
		var(--black) 66px,
		transparent 66px,
		transparent 99px,
		var(--dark-gray) 99px,
		var(--dark-gray) 100px,
		transparent 100px,
		transparent 101px,
		var(--dark-gray) 101px,
		var(--dark-gray) 102px,
		transparent 102px,
		transparent 133px,
		var(--dark-gray) 133px,
		var(--dark-gray) 134px,
		transparent 134px,
		transparent 136px,
		var(--black) 136px,
		var(--black) 138px,
		transparent 138px,
		transparent 172px,
		var(--dark-gray) 172px,
		var(--dark-gray) 173px,
		transparent 173px,
		transparent 208px,
		var(--dark-gray) 208px,
		var(--dark-green) 210px,
		transparent 210px,
		transparent 285px,
		var(--dark-gray) 285px,
		var(--dark-gray) 288px,
		var(--black) 288px,
		var(--black) 290px,
		transparent 290px,
		transparent 298px,
		var(--dark-gray) 298px,
		var(--dark-gray) 300px,
		var(--black) 300px,
		var(--black) 302px
	),
	linear-gradient(
		to right,
		var(--silver) 0% 10%,
		var(--gray) 15% 90%,
		var(--dark-gray) 100%
	);
}

.left-rocket::before {
content: "";
position: absolute;
width: 32.5px;
height: 45px;
top: -45px;
left: 0px;
background: linear-gradient(
	to right,
	var(--silver) 0% 10%,
	var(--gray) 15% 90%,
	var(--dark-gray) 100%
);
clip-path: path("M 0,45 L 32.5,45 L23,11 Q 17,-11 11,11 L 0,45");
}

.left-rocket::after {
content: "";
position: absolute;
width: 8px;
height: 11px;
top: 6px;
left: 5px;
background-color: var(--silver);
border: solid 0.5px var(--dark-gray);
}

.left-rocket-engine {
position: absolute;
height: 18.5px;
width: 46px;
top: 461px;
left: 152px;
background: linear-gradient(
	to right,
	var(--silver) 0% 10%,
	var(--gray) 15% 90%,
	var(--dark-gray) 100%
);
clip-path: polygon(17% 0%, 83% 0%, 100% 100%, 0% 100%);
}

.left-rocket-engine::before {
content: "";
position: absolute;
width: 46px;
height: 18.5px;
top: 0px;
left: 0px;
background: linear-gradient(
	to bottom,
	transparent 0 5px,
	var(--dark-gray) 5px,
	var(--dark-gray) 6px,
	transparent 6px,
	transparent 10px,
	var(--dark-gray) 10px,
	var(--dark-gray) 11px,
	transparent 11px,
	transparent 15px,
	var(--black) 15px,
	var(--black) 17px,
	transparent 16px
);
}

/* Right Rocket */
.right-rocket {
position: absolute;
width: 32.5px;
height: 302px;
top: 159px;
left: 273px;
background: linear-gradient(
		to bottom,
		transparent 25px,
		var(--dark-gray) 25px,
		var(--dark-gray) 27px,
		transparent 27px,
		transparent 28px,
		var(--black) 28px,
		var(--black) 30px,
		transparent 30px,
		transparent 62px,
		var(--dark-gray) 62px,
		var(--dark-gray) 64px,
		var(--black) 64px,
		var(--black) 66px,
		transparent 66px,
		transparent 99px,
		var(--dark-gray) 99px,
		var(--dark-gray) 100px,
		transparent 100px,
		transparent 101px,
		var(--dark-gray) 101px,
		var(--dark-gray) 102px,
		transparent 102px,
		transparent 133px,
		var(--dark-gray) 133px,
		var(--dark-gray) 134px,
		transparent 134px,
		transparent 136px,
		var(--black) 136px,
		var(--black) 138px,
		transparent 138px,
		transparent 172px,
		var(--dark-gray) 172px,
		var(--dark-gray) 173px,
		transparent 173px,
		transparent 208px,
		var(--dark-gray) 208px,
		var(--dark-gray) 210px,
		transparent 210px,
		transparent 285px,
		var(--dark-gray) 285px,
		var(--dark-gray) 288px,
		var(--black) 288px,
		var(--black) 290px,
		transparent 290px,
		transparent 298px,
		var(--dark-gray) 298px,
		var(--dark-gray) 300px,
		var(--black) 300px,
		var(--black) 302px
	),
	linear-gradient(
		to right,
		var(--dark-gray) 0%,
		var(--gray) 10% 90%,
		var(--silver) 90% 100%
	);
}

.right-rocket::before {
content: "";
position: absolute;
width: 32.5px;
height: 45px;
top: -45px;
left: 0px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0%,
	var(--gray) 10% 90%,
	var(--silver) 90% 100%
);
clip-path: path("M 0,45 L 32.5,45 L23,11 Q 17,-11 11,11 L 0,45");
}

.right-rocket::after {
content: "";
position: absolute;
width: 8px;
height: 11px;
top: 6px;
left: 20px;
background-color: var(--silver);
border: solid 0.5px var(--dark-gray);
}

.right-rocket-engine {
position: absolute;
height: 18.5px;
width: 46px;
top: 461px;
left: 267px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0%,
	var(--gray) 10% 90%,
	var(--silver) 90% 100%
);
clip-path: polygon(17% 0%, 83% 0%, 100% 100%, 0% 100%);
}

.right-rocket-engine::before {
content: "";
position: absolute;
width: 46px;
height: 18.5px;
top: 0px;
left: 0px;
background: linear-gradient(
	to bottom,
	transparent 0 5px,
	var(--dark-gray) 5px,
	var(--dark-gray) 6px,
	transparent 6px,
	transparent 10px,
	var(--dark-gray) 10px,
	var(--dark-gray) 11px,
	transparent 11px,
	transparent 15px,
	var(--black) 15px,
	var(--black) 17px,
	transparent 16px
);
}

/***********/
/* Orbiter */
/***********/

/* Wing */
.wing {
position: absolute;
height: 140px;
width: 203px;
top: 279px;
left: 132px;
background: linear-gradient(
	to right,
	var(--gray) 0% 20%,
	var(--dark-gray) 50%,
	var(--gray) 80% 100%
);
clip-path: polygon(
	35% 0%,
	64% 0%,
	69% 40%,
	72% 52%,
	98% 88%,
	100% 100%,
	0% 100%,
	2% 88%,
	28% 52%,
	31% 41%
);
}

.wing-bottom {
position: absolute;
height: 180px;
width: 210px;
top: 239px;
left: 128px;
background: var(--dark-green);
clip-path: polygon(
	38% 0%,
	61.5% 0%,
	68% 42%,
	71% 55%,
	97% 88%,
	100% 100%,
	0% 100%,
	3% 88%,
	29% 55%,
	32% 42%
);
}

/* Fuselage */
.fuselage {
position: absolute;
height: 63px;
width: 51px;
top: 160px;
left: 208px;
background: linear-gradient(
		to bottom,
		transparent 0 4px,
		var(--gun-metal) 4px,
		var(--gun-metal) 18px,
		transparent 18px,
		transparent 28px,
		var(--gun-metal) 28px,
		var(--gun-metal) 30px,
		transparent 30px
	),
	linear-gradient(
		to right,
		var(--dark-gray) 0%,
		var(--gray) 20% 75%,
		var(--dark-gray) 100%
	);
clip-path: path("M 0,63 Q 24,-63 49,63 z");
}

.fuselage-window {
position: absolute;
height: 23px;
width: 51px;
top: 200px;
left: 208px;
background: var(--gun-metal);
clip-path: path(
	"M 8,14 h 3 v 3 L 8,19 M 9,11 l 4,-3 l 2,2 l -3,3 M 21,3 l -5,3 l 0,3 l 1,0 l 3,0 l 2,-4 M 27,3 l 4,3 l 0,3 l -3,0 l -3,-4 M 34,8 l 5,3 l -3,2 l -3,-3 z M 40,14 l -3,0 l 0,3 l 3,2 z"
);
}

/* Cabin */
.cabin {
position: absolute;
height: 11px;
width: 49px;
top: 223px;
left: 208px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0%,
	var(--gray) 20% 75%,
	var(--dark-gray) 100%
);
}

.cabin::before {
content: "";
position: absolute;
height: 6px;
width: 5px;
top: 2.5px;
left: 17px;
background: var(--silver);
border-radius: 1px;
border: solid 0.5px var(--gun-metal);
}

.cabin::after {
content: "";
position: absolute;
height: 6px;
width: 5px;
top: 2.5px;
left: 25px;
background: var(--silver);
border-radius: 1px;
border: solid 0.5px var(--gun-metal);
}

/* Cargo Bay */
.cargo-bay {
position: absolute;
width: 49px;
height: 169px;
top: 234px;
left: 208px;
background: var(--silver);
background-image: linear-gradient(
		to bottom,
		transparent 0,
		var(--dark-gray) 0px,
		var(--gray) 1px,
		transparent 1px,
		transparent 41px,
		var(--dark-gray) 41px,
		var(--gray) 42px,
		transparent 42px,
		transparent 83px,
		var(--dark-gray) 83px,
		var(--gray) 84px,
		transparent 84px,
		transparent 126px,
		var(--dark-gray) 126px,
		var(--gray) 127px,
		transparent 127px,
		transparent 162px,
		var(--dark-gray) 162px,
		var(--gray) 163px,
		transparent 163px
	),
	linear-gradient(
		to right,
		var(--dark-gray) 0%,
		var(--gray) 20% 75%,
		var(--dark-gray) 100%
	);
}

.cargo-bay::before {
content: "";
position: absolute;
width: 23.5px;
height: 169px;
top: 0px;
left: 0px;
background: transparent;
border-right: solid 1px var(--dark-gray);
}

/* Elevon */
.elevon {
position: absolute;
height: 5px;
width: 209.5px;
top: 419px;
left: 128px;
background: var(--off-white);
background-image: repeating-linear-gradient(
	to right,
	var(--gun-metal) 0% 1%,
	transparent 1% 2%
);
border: 0.5px solid var(--gun-metal);
}

/* Elevon Left */
.elevon-left {
position: absolute;
height: 16px;
width: 73px;
top: 425px;
left: 125px;
background: var(--off-white);
clip-path: polygon(6% 0%, 100% 0%, 100% 100%, 3% 46%);
border-top: solid 3px var(--gun-metal);
}

.elevon-left::before {
content: "";
position: absolute;
height: 9px;
width: 2px;
top: 0px;
left: 41px;
background: transparent;
border-left: solid 1px var(--gun-metal);
transform: skew(-8deg);
}

.elevon-left::after {
content: "";
position: absolute;
height: 4px;
width: 73px;
top: 4px;
left: 2px;
background: transparent;
border-bottom: solid 3px var(--gun-metal);
transform: rotate(8deg);
}

/* Elevon Right */
.elevon-right {
position: absolute;
height: 16px;
width: 73px;
top: 425px;
left: 267px;
background: var(--off-white);
clip-path: polygon(0% 0%, 97% 0%, 100% 45%, 0% 100%);
border-top: solid 3px var(--gun-metal);
}

.elevon-right::before {
content: "";
position: absolute;
height: 9px;
width: 2px;
top: 0px;
left: 35px;
background: transparent;
border-left: solid 1px var(--gun-metal);
transform: skew(8deg);
}

.elevon-right::after {
content: "";
position: absolute;
height: 4px;
width: 75px;
top: 4px;
left: 0px;
background: transparent;
border-bottom: solid 3px var(--gun-metal);
transform: rotate(-8deg);
}

/* Aft Fuselage */
.aft-fuselage {
position: absolute;
height: 44px;
width: 29px;
top: 404px;
left: 197px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0%,
	var(--gray) 20% 75%,
	var(--dark-gray) 100%
);
border-radius: 40% 0% 0% 0% / 50% 0% 0% 0%;
}

.aft-fuselage::before {
content: "";
position: absolute;
height: 44px;
width: 29px;
top: 0px;
left: 42px;
background: linear-gradient(
	to left,
	var(--dark-gray) 0%,
	var(--gray) 20% 75%,
	var(--dark-gray) 100%
);
border-radius: 0% 40% 0% 0% / 0% 40% 0% 0%;
}

.aft-fuselage-block {
position: absolute;
width: 7px;
height: 13px;
top: 448px;
left: 197px;
background: var(--dark-gray);
box-shadow: 64px 0 0 0 var(--dark-gray);
}

/* Maneuvering Engine Right */
.maneuvering-engine-right {
position: absolute;
height: 12px;
width: 13px;
top: 447px;
left: 250px;
background: linear-gradient(
		to bottom,
		transparent 0 5px,
		var(--black) 5px,
		var(--black) 7px,
		transparent 7px,
		transparent 10px,
		var(--black) 10px,
		var(--black) 11px,
		transparent 11px,
		transparent 15px,
		var(--black) 15px,
		var(--black) 17px,
		transparent 16px
	),
	linear-gradient(
		to right,
		var(--dark-green) 0%,
		var(--silver) 60% 70%,
		var(--dark-green) 90% 100%
	);
clip-path: polygon(31% 0%, 72% 0%, 100% 100%, 0% 100%);
transform: rotate(-15deg);
}

/* Maneuvering Engine Left */
.maneuvering-engine-left {
position: absolute;
height: 12px;
width: 13px;
top: 447px;
left: 202px;
background: linear-gradient(
		to bottom,
		transparent 0 5px,
		var(--black) 5px,
		var(--black) 7px,
		transparent 7px,
		transparent 10px,
		var(--black) 10px,
		var(--black) 11px,
		transparent 11px,
		transparent 15px,
		var(--black) 15px,
		var(--black) 17px,
		transparent 16px
	),
	linear-gradient(
		to right,
		var(--dark-green) 0%,
		var(--silver) 30% 40%,
		var(--dark-green) 90% 100%
	);
clip-path: polygon(31% 0%, 72% 0%, 100% 100%, 0% 100%);
transform: rotate(15deg);
}

/* Main Engine Top Connector */
.main-engine-top-connector {
position: absolute;
width: 15px;
height: 10px;
top: 440px;
left: 224px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0% 20%,
	var(--gray) 35% 40%,
	var(--dark-gray) 80% 100%
);
clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 82% 100%, 18% 100%, 0% 75%);
}

.main-engine-top-connector::before {
content: "";
position: absolute;
width: 15px;
height: 10px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--black) 5% 10%,
	transparent 10% 30%
);
}

/* Main Engine Top */
.main-engine-top {
position: absolute;
height: 23px;
width: 24px;
top: 450px;
left: 220px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0% 20%,
	var(--gray) 35% 40%,
	var(--dark-gray) 80% 100%
);
clip-path: polygon(27% 0%, 70% 0%, 100% 100%, 0% 100%);
}

.main-engine-top::before {
content: "";
position: absolute;
height: 23px;
width: 24px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--black) 6% 8%,
	transparent 8% 12%
);
}

/* Main Engine Left Connector */
.main-engine-left-connector {
position: absolute;
width: 15px;
height: 10px;
top: 444px;
left: 209px;
background: linear-gradient(
	to left,
	var(--black) 0% 40%,
	var(--dark-gray) 55%,
	var(--black) 60% 100%
);
clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 82% 100%, 18% 100%, 0% 75%);
}

.main-engine-left-connector::before {
content: "";
position: absolute;
width: 15px;
height: 10px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--gun-metal) 5% 10%,
	transparent 10% 30%
);
}

/* Main Engine Left */
.main-engine-left {
position: absolute;
height: 23px;
width: 23px;
top: 454px;
left: 205px;
background: linear-gradient(
	to left,
	var(--black) 0% 40%,
	var(--dark-gray) 55%,
	var(--black) 60% 100%
);
clip-path: polygon(27% 0%, 70% 0%, 100% 100%, 0% 100%);
}

.main-engine-left::before {
content: "";
position: absolute;
height: 23px;
width: 23px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--gun-metal) 6% 8%,
	transparent 8% 12%
);
}

/* Main Engine Left Connector */
.main-engine-right-connector {
position: absolute;
width: 15px;
height: 10px;
top: 444px;
left: 239px;
background: linear-gradient(
	to right,
	var(--black) 0% 40%,
	var(--dark-gray) 55%,
	var(--black) 60% 100%
);
clip-path: polygon(0% 0%, 100% 0%, 100% 75%, 82% 100%, 18% 100%, 0% 75%);
}

.main-engine-right-connector::before {
content: "";
position: absolute;
width: 15px;
height: 10px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--gun-metal) 5% 10%,
	transparent 10% 30%
);
}

/* Main Engine Right */
.main-engine-right {
position: absolute;
height: 23px;
width: 23px;
top: 454px;
left: 235px;
background: linear-gradient(
	to right,
	var(--black) 0% 40%,
	var(--dark-gray) 55%,
	var(--black) 60% 100%
);
clip-path: polygon(27% 0%, 70% 0%, 100% 100%, 0% 100%);
}

.main-engine-right::before {
content: "";
position: absolute;
height: 23px;
width: 23px;
top: 0px;
left: 0px;
background: repeating-linear-gradient(
	to bottom,
	var(--gun-metal) 6% 8%,
	transparent 8% 12%
);
}

/* Vertical Stabilizer */
.vertical-stabilizer {
position: absolute;
width: 15px;
height: 98px;
top: 403px;
left: 224px;
background: linear-gradient(
	to right,
	var(--dark-gray) 0% 25%,
	var(--off-white) 40% 65%,
	var(--dark-gray) 85% 100%
);
clip-path: polygon(63% 0%, 42% 0%, 21% 26%, 55% 89%, 86% 26%);
}

.vertical-stabilizer::before {
content: "";
position: absolute;
width: 15px;
height: 98px;
top: 0px;
left: 0px;
background: linear-gradient(
	to right,
	transparent 0 7px,
	var(--black) 7px,
	var(--black) 9px,
	transparent 9px
);
}

/* Body and Container Settings */
/* Center shapes */
body {
margin: 0;
padding: 0;
height: 100vh;
display: flex;
justify-content: center;
align-items: center;
flex-wrap: wrap;
background-image: url("./medias/backRocketImage.svg");
background-repeat: no-repeat;
background-size: cover;
background-attachment: fixed;
}

/* Set background and border color */
.container {
min-width: 500px;
height: 500px;
border: 5px solid lightgray;
background: transparent;
position: relative;
margin: 5px;
display: flex;
justify-content: center;
align-items: center;
overflow: hidden;
}

</style>
