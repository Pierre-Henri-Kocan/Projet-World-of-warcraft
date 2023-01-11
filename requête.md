
SELECT item.id, raid_id, raid.name AS raid, item.name AS item, item.type, player_id, player.name AS joueur, role_id,  class, rank, event_id, date 
FROM item 
JOIN item_player ON item.id = item_player.item_id 
JOIN player ON item_player.player_id = player.id 
JOIN event_item ON event_item.item_id = item.id
JOIN event ON event.id = event_item.event_id
JOIN raid ON raid.id = item.raid_id