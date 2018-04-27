<?php
error_reporting(0);

	class db {
		private $db = null;
		private $online = false;
		private $username;
		private $password;
		private $hostname;
		private $database;
		private $prefix;
		private $mysqli;
		private $debug;
		private $log = null;

		public function __construct() {
			$this->initialize();
			$this->connect();
		}

		private function initialize() {
			$options = array(
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => 'root',
				'database' => 'project',
				'mysqli' => true,
				'debug' => false
			);
			foreach ($options as $option => $default)
					$this->$option = $default;
		}

		public function __destruct() {
			$this->dbg('destruct()');
			$this->disconnect();
		}

		public function __toString() {
			return '('.$this->username.', '.$this->password.', '.$this->database.', '.$this->hostname.')';
		}

		private function dbg($text) {
			if ($this->debug) {
				echo $text;
				echo '</br>';
			}
		}

		public function set_debug($state) {
			$this->debug = $state;
		}

		public function get_debug() {
			return $this->debug;
		}

		public function get_status() {
			return $this->online;
		}

		public function block_begin() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('block_begin()');
			if ($this->mysqli)
				$this->db->autocommit(false);
			else
				$this->query('BEGIN');
			return true;
		}

		public function block_cancel() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('block_cancel()');
			if ($this->mysqli) {
				$this->db->rollback();
				$this->db->autocommit(true);
			} else
				$this->query('ROLLBACK');
			return true;
		}

		public function block_end() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('block_end()');
			if ($this->mysqli) {
				$this->db->commit();
				$this->db->autocommit(true);
			} else
				$this->query('COMMIT');
			return true;
		}

		public function connect() {
			$this->dbg('connect('.$this->hostname.', '.$this->username.', '.$this->password.', '.$this->database.')');
			if ($this->mysqli)
				return $this->connect_mysqli();
			else
				return $this->connect_mysql();
		}

		private function connect_mysqli() {
			$this->db = new mysqli($this->hostname, $this->username, $this->password, $this->database);
			if ($this->db->connect_error) {
				if ($this->debug)
					$this->dbg('error: '.$this->last_error());
				return false;
			}
			$this->dbg('set-charset: utf8');
			if (@$this->db->set_charset('utf8')) {
				$this->online = true;
				return true;
			} else {
				if ($this->debug)
					$this->dbg('error: '.$this->last_error());
				$this->disconnect();
				return false;
			}
		}

		private function connect_mysql() {
			$this->db = mysqli_connect($this->hostname, $this->username, $this->password, TRUE);
			if ($this->db === false) {
				if ($this->debug)
					$this->dbg('error: '.$this->last_error());
				return false;
			}
			$this->dbg('select: '.$this->database);
			if (@mysqli_select_db($this->database, $this->db)) {
				$this->dbg('set-charset: utf8');
				if (@mysql_set_charset('utf8', $this->db)) {
					$this->online = true;
					return true;
				}
			}
			if ($this->debug)
				$this->dbg('error: '.$this->last_error());
			$this->disconnect();
			return false;
		}

		public function last_error() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('last_error()');
			if ($this->mysqli)
				return @$this->db->error;
			return @mysql_error($this->db);
		}

		public function query($query) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('query: '.$query);
			if ($this->mysqli)
				$q = @$this->db->query($query);
			else
				$q = @mysql_query($query, $this->db);
			if ($q)
				return $q;
			if ($this->debug)
				if ($this->mysqli)
					$this->dbg('error: '.@$this->db->error);
				else
					$this->dbg('error: '.@mysql_error($this->db));
			return false;
		}

		public function seek($resource, $count) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			if ($this->mysqli)
				$rete = @$resource->data_seek($count);
			else
				$ret = @mysql_data_seek($resource, $count);
			$this->dbg('seek: '.$ret);
			return $ret;
		}

		public function last_insert_id() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('last_insert_id()');
			if ($this->mysqli){
				return $this->db->insert_id;
			}
			$q = @mysql_query('SELECT LAST_INSERT_ID()');
			$d = @mysql_fetch_assoc($q);
			return $d['LAST_INSERT_ID()'];
		}

		public function num_rows($resource) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			if ($this->mysqli)
				$ret = @$resource->num_rows;
			else
				$ret = @mysql_num_rows($resource);
			$this->dbg('num_rows: '.$ret);
			return $ret;
		}

		public function affected_rows() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			if ($this->mysqli)
				$ret = @$this->db->affected_rows;
			else
				$ret = @mysql_affected_rows($this->db);
			$this->dbg('affected_rows: '.$ret);
			return $ret;
		}

		public function fetch_row($resource) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('fetch_row()');
			if ($this->mysqli)
				return @$resource->fetch_row();
			return @mysql_fetch_row($resource);
		}

		public function fetch_assoc($resource) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('fetch_assoc()');
			if ($this->mysqli)
				return @$resource->fetch_assoc();
			return @mysql_fetch_assoc($resource);
		}

		public function fetch_array($resource) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('fetch_assoc()');
			if ($this->mysqli)
				return @$resource->fetch_assoc();
			return @mysql_fetch_assoc($resource);
		}

		public function free($resource) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('free()');
			if ($this->mysqli)
				@$resource->free();
			@mysql_free_result($resource);
		}

		public function quote($data) {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('quote: '.$data);
			if ($data == 'NULL')
				return $data;
			if ($this->mysqli)
				return $this->db->real_escape_string(trim($data));
			return mysql_real_escape_string(trim($data), $this->db);
		}

		public function disconnect() {
			if ((is_null($this->db)) || ($this->db === false))
				return false;
			$this->dbg('disconnect()');
			$this->online = false;
			if ($this->mysqli)
				@$this->db->close();
			else
				@mysql_close($this->db);
			$this->db = null;
		}

		public function insert($table, $info, $more = false){
			if(!$table){
				return false;
			}
			$sql = 'INSERT INTO '.$table;
			if($info){
				if(!$more){
					$keys = array_keys($info);
					$sql .= ' ('.implode(',', $keys).') VALUES (\''.implode('\',\'', $info).'\')';
				}else{
					$keys = array_keys(current($info));
					$count = count($keys);
					$sql .= ' ('.implode(',', $keys).') VALUES ';
					foreach($info as $val){
						if(is_array($val) && count($val) == $count){
							$sql .= $step.'(\''.implode('\',\'', $val).'\')';
							$step = ',';
						}
					}
				}
			}
			$this->query($sql);
			if(!$more){
				return $this->last_insert_id();
			}
		}

		public function update($table,$info, $where, $only = false){
			if(!$table){
				return false;
			}
			if(!$info){
				return false;
			}
			$sql = 'UPDATE '.$table.' SET ';
			$step = '';
			foreach($info as $key => $val){
				$sql .= $step.$key.' = \''.$val.'\'';
				$step = ',';
			}
			if(($where = ltrim($where)) && strncasecmp($where, 'WHERE ', 6) != 0){
				$where = ' WHERE '.$where;
			}
			$sql .= ' '.$where;
			$only && $sql .= ' LIMIT 1';
			return $this->query($sql);
		}

		public function query_sql($sql){
			return $this->query($sql);
		}

		public function fetch_all($sql,$key=''){
			$datas = array();
			$query = @$this->query($sql);
			while($row = $this->fetch_array($query)){
				if($key){
					$datas[$row[$key]]=$row;
				}else{
					$datas[] = $row;
				}
			}
			return $datas;
		}

		public function fetch_rows($sql){
			$query = $this->query($sql);
			return $this->num_rows($query);
		}

		public function fetch_one($sql){
			$query = $this->query($sql);
			$data  = $this->fetch_assoc($query);
			return $data;
		}


	}
?>
