<?php
namespace ZaneFlow;
use pocketmine\Player;
use pocketmine\Server;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\CommandExecutor;
use pocketmine\command\PluginCommand;

class Info extends PluginBase implements Listener{
	
	public function onEnable(){
		$this->getLogger()->info("Server Info Plugin Is Made By Zane_Flow");
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		@mkdir($this->getDataFolder());
		$this->saveDefaultConfig();
		$this->getResource("config.yml");
	}

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args){
        switch($cmd->getName()){
			case "information":
			if($sender instanceof Player){
			# if($sender->hasPermission("info.cmd")){ 
						$sender->sendMessage($this->getConfig()->get("Prefix"));
						$sender->sendMessage("§fName§8: §b" . $this->getConfig()->get("Server-Name"));
						$sender->sendMessage("§fIp§8: §b" . $this->getConfig()->get("Server-Ip"));
						$sender->sendMessage("§fPort§8: §b" . $this->getConfig()->get("Server-Port"));
						$sender->sendMessage("§fOwner§8: §b" . $this->getConfig()->get("Server-Owner"));
						$sender->sendMessage("§fWebsite§8: §b" . $this->getConfig()->get("Server-Website"));
						
			# }
				
			}
			break;
		}
	}
}
