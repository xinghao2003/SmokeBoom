<?php

namespace SmokeBomb;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileLaunchEvent;
use pocketmine\event\entity\EntityDespawnEvent;
use pocketmine\entity\Snowball;
use pocketmine\Player;
use pocketmine\math\Vector3;
use pocketmine\level\particle\MobSpawnParticle;

	class SmokeBomb extends PluginBase implements Listener {
    
    public $distance = 100; # The distance from spawn where will not be particles from throwing snow

		public function onEnable() {
			$this->getServer()->getPluginManager()->registerEvents($this, $this);
		}

		public function onSnowballDown(EntityDespawnEvent $event) {

			if($event->getType() === 81) {

				$entity = $event->getEntity();
				$shooter = $entity->getOwningEntity();
				$x = $entity->getX();
				$y = $entity->getY();
				$z = $entity->getZ();
				$dist = new Vector3($x, $y, $z);
				$spawn = $this->getServer()->getDefaultLevel()->getSafeSpawn();

				if($spawn->distance($dist) <= $this->distance)
					return;

				$level = $entity->getLevel();

				for ($i = 1; $i < 5; $i++) {
					$v4 = new Vector3($x + 1, $y + $i, $z);
					$v5 = new Vector3($x - 1, $y + $i, $z);
					$v6 = new Vector3($x, $y + $i, $z + 1);
					$v7 = new Vector3($x, $y + $i, $z - 1);
					$level->addParticle(new MobSpawnParticle($v4));
					$level->addParticle(new MobSpawnParticle($v5));
					$level->addParticle(new MobSpawnParticle($v6));
					$level->addParticle(new MobSpawnParticle($v7));
        }
      }
    }
  }
?>
