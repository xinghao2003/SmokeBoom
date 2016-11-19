<?php
//加密方式：php源码混淆类加密。免费版地址:http://www.zhaoyuanma.com/phpjm.html 免费版不能解密,可以使用VIP版本。
//此程序由【找源码】http://Www.ZhaoYuanMa.Com (免费版）在线逆向还原，QQ：7530782 
?>
<?php
namespace ISSmokebomb; 
use pocketmine\plugin\PluginBase; 
use pocketmine\event\Listener; 
use pocketmine\event\entity\ProjectileLaunchEvent; 
use pocketmine\event\entity\EntityDespawnEvent; 
use pocketmine\event\player\PlayerJoinEvent; 
use pocketmine\entity\Snowball; 
use pocketmine\Player; 
use pocketmine\level\Position; 
use pocketmine\math\Vector3; 
use pocketmine\level\particle\MobSpawnParticle; 

class ISSmokebomb extends PluginBase implements Listener { public $version = "V[1.0.0]Test0"; 

public function onEnable(){ $this->getServer()->getPluginManager()->registerEvents($this, $this); $this->getLogger()->info(">>   §bISSmokebomb - 加载!"); $this->getLogger()->info("§7浅白科技：" .$this->version); } public function onSnowballLaunch(ProjectileLaunchEvent $event){ $entity = $event->getEntity(); $shooter = $entity->shootingEntity; if($entity instanceof Snowball && $shooter instanceof Player){ $shooter->sendTip(">>   §b烟雾弹发射完毕"); } } public function onSnowballDown(EntityDespawnEvent $event){ if($event->getType() === 81){ $entity = $event->getEntity(); $shooter = $entity->shootingEntity; $x = $entity->getX(); $y = $entity->getY(); $z = $entity->getZ(); $level = $entity->getLevel(); for ($i=1; $i < 5; $i++) { $v4 = new Vector3($x + 1,$y + $i,$z); $v5 = new Vector3($x - 1,$y + $i,$z); $v6 = new Vector3($x,$y + $i,$z + 1); $v7 = new Vector3($x,$y + $i,$z - 1); $level->addParticle(new MobSpawnParticle($v4)); $level->addParticle(new MobSpawnParticle($v5)); $level->addParticle(new MobSpawnParticle ($v6)); $level->addParticle(new MobSpawnParticle($v7)); } } } public function onDisable(){ $this->getLogger()->info(">>   §bISSmokebomb - 卸载!"); } } ?>