<?php
/**
 * This file is part of php-io.
 *
 * php-io is free software: you can redistribute it and/or modify it under the
 * terms of the GNU LEsser General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * php-io is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with php-io.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @author Grégory PLANCHAT <g.planchat@gmail.com>
 * @license Lesser General Public License v3 (http://www.gnu.org/licenses/lgpl-3.0.txt)
 * @copyright Copyright (c) 2013 Grégory PLANCHAT (http://planchat.fr/)
 */

namespace Gplanchat\Io\Net\Protocol\Http;

use Gplanchat\ServiceManager\ServiceManager;
use Gplanchat\ServiceManager\Configurator;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

class ServerServiceManager
    extends ServiceManager
{
    /**
     * @param array $config
     * @param Configurator $configurator
     * @param LoggerInterface $logger
     */
    public function __construct(array $config = null, Configurator $configurator = null, LoggerInterface $logger = null)
    {
        if ($config === null) {
            $config = [
                'invokables' => [
                    'RequestHandler' => __NAMESPACE__ . '\\DefaultRequestHandler'
                ],
                'singletons' => [
                    'ServerConnectionHandler' => __NAMESPACE__ . '\\ServerConnectionHandler',
                    'ProtocolUpgrader'        => __NAMESPACE__ . '\\ProtocolUpgrader'
                    ],
                'alias'      => [],
                'factories'  => [
                    'Request'  => new RequestFactory(),
                    'Response' => new ResponseFactory()
                    ]
                ];
        }

        if ($configurator === null) {
            $configurator = new Configurator();
        }

        $configurator($this, $config);

        if (!$this->has('Logger')) {
            if ($logger === null) {
                $logger = new NullLogger();
            }

            $this->registerSingleton('Logger', $logger);
        }
    }
}
