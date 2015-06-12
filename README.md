# OpenDungeons-Masterserver

0. To store the masterserver url in some ini  
`masterserver=http://opendungeons.tuxfamily.org/masterserver/`  
NOTE: this link doesn't exists , and ofc it should be used as variable in upcoming calls)

2. When someone clicks to host a game, an `UUID` should be generated and HTTP request should be made to:  
`http://opendungeons.tuxfamily.org/masterserver/announce.php?uuid=UUID-HERE&ip=IP-HERE`

3. Should make constant checks every 1 minute if server is still available:  
`http://opendungeons.tuxfamily.org/masterserver/update.php?uuid=UUID-HERE&status=0`

3. When game starts:  
`http://opendungeons.tuxfamily.org/masterserver/update.php?uuid=UUID-HERE&status=1`

4. Then during a game every 1 min another request should be made:
`http://opendungeons.tuxfamily.org/masterserver/update.php?uuid=UUID-HERE&status=1`

5. And one when game ends:
`http://opendungeons.tuxfamily.org/masterserver/update.php?uuid=UUID-HERE&status=2`

**Status:** (2015/06/12)

For now, this is just a prototype and after this works, we can focus on adding live game stats, better security to prevent abuse etc.
And this will show only in a web browser, but i will provide a CSV, json and XML (if you really need this last one), so it can be used in-game.


**Legend of statuses**

0 = Available, 1 = Game in progress, 2 = Game Over, 3 = Not responding
3 is checked in php/mysql
