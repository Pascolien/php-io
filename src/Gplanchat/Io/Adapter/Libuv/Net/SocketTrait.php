<?php
/**
 * This file is part of Gplanchat\Io.
 *
 * Gplanchat\Io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Gplanchat\Io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Gplanchat\Io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

/**
 * @namespace
 */
namespace Gplanchat\Io\Adapter\Libuv\Net;

/**
 * Base socket functionalities to be implemented.
 *
 * @package    Gplanchat\Io
 * @subpackage Libuv
 * @category   Net
 * @author     Grégory PLANCHAT<g.planchat@gmail.com>
 * @licence    GNU Lesser General Public Licence (http://www.gnu.org/licenses/lgpl-3.0.txt)
 */
trait SocketTrait
{
    private $socket = null;
    private $port = 0;

    /**
     * Returns the internal uv resource
     *
     * @return resource
     */
    public function getBackend()
    {
        return $this->socket;
    }

    /**
     * Describes the socket as a string in the form of <ip>:<port>
     *
     * @return string
     */
    public function __toString()
    {
        return sprintf('%s:%d', $this->getAddress(), $this->getPort());
    }

    /**
     * Returns the port used
     *
     * @return int
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Get the address of the socket
     *
     * @return string
     */
    abstract public function getAddress();
}
