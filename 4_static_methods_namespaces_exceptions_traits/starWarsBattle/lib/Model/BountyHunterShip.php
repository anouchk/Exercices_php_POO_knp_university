<?

namespace Model;

class BountyHunterShip extends AbstractShip
{
	use SettableJediFactorTrait;

	public function getType() {

		return 'Bounty Hunter';

	}

	// They're never broken
	public function isFunctional() {

		return true ;
	}

}