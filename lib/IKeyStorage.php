<?php

declare(strict_types=1);
/**
 * @copyright Copyright (c) 2020 Georg Ehrke <georg-nextcloud@ehrke.email>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
namespace OCA\EndToEndEncryption;

use OCA\EndToEndEncryption\Exceptions\KeyExistsException;
use OCP\Files\ForbiddenException;
use OCP\Files\NotFoundException;
use OCP\Files\NotPermittedException;
use OCP\IUser;

/**
 * Interface IKeyStorage
 *
 * @package OCA\EndToEndEncryption
 */
interface IKeyStorage {

	/**
	 * Get users public key
	 *
	 * @param string $uid
	 * @return string
	 *
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 */
	public function getPublicKey(string $uid): string;

	/**
	 * Check if a public key exists
	 *
	 * @param string $uid
	 * @return bool
	 *
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 */
	public function publicKeyExists(string $uid): bool;

	/**
	 * store public key
	 *
	 * @param string $publicKey
	 * @param string $uid
	 *
	 * @throws KeyExistsException
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 */
	public function setPublicKey(string $publicKey, string $uid): void;

	/**
	 * delete the users public key
	 *
	 * @param string $uid
	 *
	 * @throws NotPermittedException
	 * @throws NotFoundException
	 */
	public function deletePublicKey(string $uid): void;

	/**
	 * get users private key
	 *
	 * @param string $uid
	 * @return string
	 *
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 * @throws ForbiddenException
	 */
	public function getPrivateKey(string $uid): string;

	/**
	 * check if a private key exists
	 *
	 * @param string $uid
	 * @return bool
	 *
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 * @throws ForbiddenException
	 */
	public function privateKeyExists(string $uid): bool;

	/**
	 * store private key
	 *
	 * @param string $privateKey
	 * @param string $uid
	 *
	 * @throws KeyExistsException
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 * @throws ForbiddenException
	 */
	public function setPrivateKey(string $privateKey, string $uid): void;

	/**
	 * get users private key
	 *
	 * @param string $uid
	 *
	 * @throws NotPermittedException
	 * @throws NotFoundException
	 */
	public function deletePrivateKey(string $uid): void;

	/**
	 * delete all user private and public key permanently
	 *
	 * @param IUser $user
	 *
	 * @throws NotFoundException
	 * @throws NotPermittedException
	 */
	public function deleteUserKeys(IUser $user): void;
}
