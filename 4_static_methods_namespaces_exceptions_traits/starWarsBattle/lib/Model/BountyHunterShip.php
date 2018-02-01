<?

namespace Model;

class BountyHunterShip extends AbstractShip
{

	private $jediFactor;

	// The Jedi factor will vay ship by ship
	public function getJediFactor() {

		return $this->jediFactor;

	}


	public function getType() {

		return 'Bounty Hunter';

	}

	// They're never broken
	public function isFunctional() {

		return true ;
	}

	public function setJefiFactor($jediFactor) {
		$this->jediFactor = $jediFactor;
	}


}