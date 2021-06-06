<?php


namespace App\Tests\Integration;


class GameImportTest extends KernelTestCase
{


    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;


    protected function setUp(): void
    {
        parent::setUp();
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();

        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->companyRepository = $this->entityManager->getRepository(Company::class);

        $this->userFixtures = new UserFixtures();
        $this->userFixtures->truncateTable($this->entityManager);

        $this->tmp = Helper::getFixturesPath() . '/tmp';

        $parameterBagBridgeStub = $this->createMock(ParameterBagBridgeInterface::class);
        $parameterBagBridgeStub->method('get')
            ->willReturn($this->tmp);

        $this->userImport = new UserBusinessFacade(
            self::$container->get(UserImportServiceInterface::class),
            Helper::getFileService(),
            $parameterBagBridgeStub
        );
        Helper::clearTmpFile();
    }



    protected function tearDown(): void
    {
        Helper::clearTmpFile();

        $this->userFixtures->load($this->entityManager);
        $this->entityManager->close();
        $this->entityManager = null;

        parent::tearDown();
    }

}